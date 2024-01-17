<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
     // display drivers
     public function __construct(){
        $this->middleware('auth');
    }

    public function list() {
        $items = Driver::orderBy('name', 'asc')->get();

        return view(
            'driver.list',
            [
                'title' => 'Drivers',
                'items' => $items,
            ]
        );
    }

    public function create() {
        return view(
            'driver.form',
            [
                'title' => 'Add new driver',
                'driver' => new Driver()
            ]
            );
    }

    private function saveDriverData(Driver $driver, DriverRequest $request){
        $validatedData = $request->validated();
        $driver->name = $validatedData['name'];
        $driver->save();
    }

    public function put(DriverRequest $request){
        
        $driver = new Driver();
        
        $this->saveDriverData($driver, $request);

        return redirect('/drivers');
    }
    
    public function update(Driver $driver){
        return view(
            'driver.form',
            [
                'title' => 'Edit driver',
                'driver' => $driver
            ]
            );
    }

    public function patch(Driver $driver, DriverRequest $request){
        
        $this->saveDriverData($driver, $request);

        return redirect('/drivers');
    }

    public function delete(Driver $driver){
        $driver->delete();
        return redirect('/drivers');
    }
}
