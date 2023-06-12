<?php

namespace Http\Controllers;

use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp():void{
        parent::setUp();
        $this->employee = $this->createEmployee();
        $this->client = $this->createClient();
        $this->car = $this->createCar();
    }

    public function testCreate()
    {
        $response = $this->postJson('api/cars', [
            'modelName' => $this->car->model_name,
            'clientId' => $this->car->client_id,
        ]);

        $response->assertStatus(201)->assertJson(['Message' => 'Car created successfuly']);
    }

    public function testRead()
    {
        $response = $this->get("api/cars/".$this->car->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'model_name' => $this->car->model_name,
            'client_id' => $this->car->client_id,
        ]);
    }

    public function testReadAll()
    {
        $response = $this->get("api/cars");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'model_name' => $this->car->model_name,
            'client_id' => $this->car->client_id,
        ]);
    }

    public function testUpdate()
    {
        $response = $this->putJson("api/cars/{$this->car->id}",[
            'modelName' => 'ModelName',
            'client_id' => '1',
        ]);

        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->delete("api/cars/".$this->car->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('cars', ['id' => $this->car->id]);
    }
    private function createEmployee():Employee {
        return Employee::factory()->create([
            'id' => 1
        ]);
    }
    private function createClient():Client {
        return Client::factory()->create([
            'id' => 1,
            'employee_id' => 1
        ]);
    }

    private function createCar():Car {
        return Car::factory()->create([
            'client_id' => 1
        ]);
    }
}
