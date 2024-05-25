<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BaseController;
use App\Models\Car;
use App\Models\RentSession;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $now = Carbon::now();

        $expiredSessions = RentSession::where('isActive', true)
            ->where('date_end', '<', $now)
            ->get();

        foreach ($expiredSessions as $session) {
            $session->isActive = false;
            $session->save();

            $car = Car::find($session->car_id);
            if ($car) {
                $car->tenant_id = null;
                $car->save();
            }
        }
        
        return $next($request);
    }
}
