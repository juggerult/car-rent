<?php

namespace App\Http\Controllers;

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
            'images' => 'required|array',
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
}
