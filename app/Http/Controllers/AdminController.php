<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    
    public function addNewCarIndex(){
        return view('templates.admin_header') .view('managemetFolder.addCar');
    }

    public function managersIndex(){
        
        $managers = $this->serviceGET->getAllManagers();

        return view('templates.admin_header') .view('managemetFolder.managers', compact('managers'));
    }

    private function getCarDataForm($request){
        $data = $request->validate([
            'description' => 'required',
             'type' => 'required',
             'mark' => 'required',
             'year' => 'required',
             'gearbox' => 'required',
             'engine' => 'required',
             'color' => 'required',
             'price' => 'required',
        ]);

        return $data;
    }
    private function getCarImages($request){
        $images = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        return $images;
    }
    public function addNewCar(Request $request){
        
        $data = $this->getCarDataForm($request);
        $images = $this->getCarImages($request);

        $carId = $this->servicePOST->addNewCar($data);

        $this->servicePOST->addImagesCar($images, $carId);

        return redirect()->to(route('add.new.car'));

    }
    public function deleteCar($id)
    {
        $car = Car::find($id);
        $car->isActive = false;
        $car->save();

        return redirect()->back();
    }
    public function returnCar($id)
    {
        $car = Car::find($id);
        $car->isActive = true;
        $car->save();

        return redirect()->back();
    }
    public function editCarIndex($id)
    {
        $car = Car::find($id);

        return view('templates.admin_header') .view('managemetFolder.editCar', compact('car'));
    }
    public function saveUpdateCar(Request $request, $id)
    {
        $data = $this->getCarDataForm($request);
        $images = $this->getCarImages($request);

        $this->servicePOST->updateCar($data, $id);

        $this->servicePOST->addImagesCar($images, $id);

        return redirect()->to(route('admin.cars'));
    }
    public function financeIndex()
    {
        $monthIncome = RentSession::whereBetween('date_start', [now()->startOfMonth(), now()->endOfMonth()])->sum('price');
        $weekIncome = RentSession::whereBetween('date_start', [now()->startOfWeek(), now()->endOfWeek()])->sum('price');
        $dayIncome = RentSession::whereDate('date_start', now()->toDateString())->sum('price');
    
        // Данные за последние 7 дней
        $dailyIncomes = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $income = RentSession::whereDate('date_start', $date)->sum('price');
            $dailyIncomes[] = ['date' => $date, 'income' => $income];
        }
    
        // Данные по месяцам за текущий год
        $monthlyIncomes = [];
        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::createFromDate(now()->year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate(now()->year, $month, 1)->endOfMonth();
            $income = RentSession::whereBetween('date_start', [$startOfMonth, $endOfMonth])->sum('price');
            $monthlyIncomes[] = ['month' => $startOfMonth->format('F'), 'income' => $income];
        }
        
        $popularCars = RentSession::select('car_id')
        ->groupBy('car_id')
        ->limit(3)
        ->get();

        return view('templates.admin_header')
            .view('managemetFolder.finance', compact('monthIncome', 'weekIncome', 'dayIncome', 'dailyIncomes', 'monthlyIncomes', 'popularCars'));
    }

    public function addUserIndex()
    {
        return view('templates.admin_header') .view('managemetFolder.addUser');
    }
    public function addNewUser(Request $request)
    {
        $data = $this->getUserForm($request);

        $checkResult = $this->checkAvailable($data);

        if ($checkResult === true) {
            try {
                $this->servicePOST->registrationUserByAdmin($data);    
                return redirect()->route('add.user.index')->withErrors(['error' => 'Пользователь успешно зарегистрирован']);
            } catch (\Exception $e) {
                return redirect()->route('add.user.index')->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->route('add.user.index')->withErrors(['error' => 'Пользователь c таким номером или почтой уже зарегестрирован']);
        }
    }
    private function checkAvailable($data)
    {
        if (User::where('email', $data['email'])->first()) {
            return false;
        } elseif (User::where('phone_number', $data['phone_number'])->first()) {
            return false;;
        }

        return true;
    }
 private function getUserForm(Request $request)
    {
        return $request->validate([
            'first_name' => 'required',
            'last_name'=> 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'status' => 'required',
        ]);
    }
}
