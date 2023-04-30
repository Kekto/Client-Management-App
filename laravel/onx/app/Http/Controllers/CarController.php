<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function ex_2(int $id){
        $car = Car::find($id);

        if($car->client_id != null){
            return 0;
        }
        return  1;
    }
    public function create(Request $request){
        $car = new Car();
        $car->model_name = $request->modelName;
        $car->client_id = $request->clientId;
        $car->save();
    }
    public function update(int $id,Request $request){
        $car = Car::find($id);
        $car->model_name = $request->modelName;
        $car->client_id = $request->clientId;
        $car->save();
    }
    public function read(int $id){
        return Car::find($id);
    }
    public function readAll(){
        return Car::all();
    }
    public function delete(int $id){
        $car = Car::find($id);
        $car->delete();
    }

}
