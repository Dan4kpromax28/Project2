<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Author;
use App\Models\Driver;
use App\Http\Requests\CarRequest;


class CarController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function list()
    {
        $items = Car::orderBy('name', 'asc')->get();
            return view(
                'car.list',
                [
                    'title' => 'Cars',
                    'items' => $items
                ]
             );
    }

    public function create(){
        $authors = Author::orderBy('name','asc')->get();
        $drivers = Driver::all();

        return view(
            'car.form',
            [
                'title' => 'Add car',
                'car' => new Car(),
                'authors' => $authors,
                'drivers' => $drivers,
                
            ]
            );
    }

    private function saveCarData(Car $car, CarRequest $request){
        $validatedData = $request->validated();
     
        $car->fill($validatedData);
        $car->display = (bool) ($validatedData['display'] ?? false);

    if ($request->hasFile('image')) {
        $uploadedFile = $request->file('image');
        $extension = $uploadedFile->clientExtension();
        $name = uniqid();
        $car->image = $uploadedFile->storePubliclyAs(
        '/',
        $name . '.' . $extension,
        'uploads'
        );
       }
       
     $car->save();
    }


    public function put(CarRequest $request)
    {
        $car = new Car();
        $this->saveCarData($car, $request);
        return redirect('/cars');
    }
    
    public function update(Car $car)
    {
        $authors = Author::orderBy('name', 'asc')->get();
        $drivers = Driver::all();

        return view(
            'car.form',
            [
                'title' => 'Edit car',
                'car' => $car,
                'authors' => $authors,
                'drivers' => $drivers,
                
            ]
        );
    }

    public function patch(Car $car, CarRequest $request)
    {
        $this->saveCarData($car, $request);
        return redirect('/cars/update/' . $car->id);
    }

    public function delete(Car $car){
        $car->delete();
        return redirect('/cars');
    }
    
}
