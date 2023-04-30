<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
class ClientController extends Controller
{
    public function ex_1(){
        $clients = DB::table('clients')
            ->join('employees','employees.id','=','clients.employee_id')
            ->join('orders','orders.id','=','orders.client_id')
            ->select('clients.*','employees.*','orders.*')
            ->get();

        return $clients;
    }
    public function create(Request $request){
        $client = new Client();
        $client->first_name = $request->firstName;
        $client->last_name = $request->lastName;
        $client->birth_date = $request->birthDate;
        $client->phone_number = $request->phoneNumber;
        $client->email = $request->email;
        $client->employee_id = $request->employee;
        $client->save();
    }
    public function update(int $id,Request $request){
        $client = Client::find($id);
        $client->first_name = $request->firstName;
        $client->last_name = $request->lastName;
        $client->birth_date = $request->birthDate;
        $client->phone_number = $request->phoneNumber;
        $client->email = $request->email;
        $client->employee_id = $request->employee;
        $client->save();
    }
    public function read(int $id){
        return Client::find($id);
    }
    public function readAll(){
        return Client::all();
    }
    public function delete(int $id){
        $client = Client::find($id);
        $client->delete();
    }
}
