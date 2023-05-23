<?php

namespace App\Http\Controllers;

use App\Models\ClientDTO;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
class ClientController extends Controller
{
    public function ex_1(){
        $clients = DB::table('clients')
            ->join('employees','employees.id','=','clients.employee_id')
            ->select('clients.*','employees.*')
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

        return response(['Message' => 'Client created successfuly'],201);
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

        return response(['Message' => 'Client updated successfuly'],200);
    }
    public function read(int $id){
        $client = Client::find($id);
        return response(
            ['Message' => 'Client '.$id,
                'client' => Client::find($id),
            ],200);
    }
    public function readDetails(int $id){
        $client = Client::find($id);
        $employee = Employee::find($client->employee_id);
        $clientDTO = new ClientDTO();
        $clientDTO->client = $client;
        $clientDTO->employee = $employee;
        return response(
            ['Message' => 'Client '.$id.' Details',
                'client' => $clientDTO,
            ],200);
    }
    public function readAll(){
        $clients = DB::table('clients')
            ->leftjoin('employees','employees.id','=','clients.employee_id')
            ->select('clients.*','employees.first_name as employees_first_name','employees.last_name  as employees_last_name')
            ->get();
        return response(['Message' => 'All Clients','client' => $clients],200);
    }
    public function delete(int $id){
        $client = Client::find($id);
        $client->delete();
        return response(['Message' => 'Client Deleted Succesfuly'],200);
    }
}
