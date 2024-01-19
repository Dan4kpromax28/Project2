<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class DataController extends Controller
{
    //
    // Returns 3 published car objects in random order
    public function getTopCars(){
        $cars = Car::where('display', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $cars;
}
// Returns the selected Car object, if it’s published
    public function getCar(Car $car){
        $selectedCar = Car::where([
            'id' => $car->id,
            'display' => true,
        ])
    ->firstOrFail();
        return $selectedCar;
}
// Returns 3 published Car objects in random order- except the selected one
    public function getRelatedCars(Car $car){
        $cars = Car::where('display', true)
            ->where('id', '<>', $car->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $cars;
}


}
