<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Author;


class CarController extends Controller
{
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

        return view(
            'car.form',
            [
                'title' => 'Add car',
                'car' => new Car(),
                'authors' => $authors,
            ]
            );
    }


    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
     ]);

     $car = new Car();
     $car->name = $validatedData['name'];
     $car->author_id = $validatedData['author_id'];
     $car->description = $validatedData['description'];
     $car->price = $validatedData['price'];
     $car->year = $validatedData['year'];
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
     return redirect('/cars');
    }
    
    public function update(Car $car)
    {
        $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'car.form',
            [
                'title' => 'Edit car',
                'car' => $car,
                'authors' => $authors,
            ]
        );
    }

    public function patch(Car $car, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);
        $car->name = $validatedData['name'];
        $car->author_id = $validatedData['author_id'];
        $car->description = $validatedData['description'];
        $car->price = $validatedData['price'];
        $car->year = $validatedData['year'];
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
        
        return redirect('/cars/update/' . $car->id);
    }

    public function delete(Car $car){
        $car->delete();
        return redirect('/cars');
    }
}
