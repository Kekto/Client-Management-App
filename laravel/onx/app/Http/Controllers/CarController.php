<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Auth\Events\Registered;
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

        event(new Registered($car));

        return response(['Message' => 'Car created successfuly'],201);
    }
    public function update(int $id,Request $request){
        $car = Car::find($id);
        $car->model_name = $request->modelName;
        $car->client_id = $request->clientId;
        $car->save();

        return response(['Message' => 'Car updated successfuly'],200);
    }
    public function read(int $id){
        return response(['Message' => 'Car '.$id,'car' => Car::find($id)],200);
    }
    public function readAll(){
        return response(['Message' => 'All cars','car' => Car::all()],200);

    }
    public function delete(int $id){
        $car = Car::find($id);
        $car->delete();

        return response(['Message' => 'Car Deleted Succesfuly'],200);
    }

}
