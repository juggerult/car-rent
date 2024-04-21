<?php

namespace App\Http\Controllers;

use App\Services\Get\Service as GetService;
use App\Services\Post\Service as PostService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $serviceGET;
    public $servicePOST;

    public function __construct(GetService $getService, PostService $postService){
        $this->serviceGET = $getService;
        $this->servicePOST = $postService;
    }
}
