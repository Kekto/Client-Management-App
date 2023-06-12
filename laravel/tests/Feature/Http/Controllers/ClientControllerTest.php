<?php

namespace Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp():void{
        parent::setUp();
        $this->employee = $this->createEmployee();
        $this->client = $this->createClient();
    }
    public function testCreate()
    {
        $response = $this->postJson('api/clients', [
            'firstName' => $this->client->first_name,
            'lastName' => $this->client->last_name,
            'birthDate' => $this->client->birth_date,
            'phoneNumber' => $this->client->phone_number,
            'email' => $this->client->email,
            'employee' => $this->client->employee_id,
        ]);

        $response->assertStatus(201)->assertJson(['Message' => 'Client created successfuly']);
    }

    public function testRead()
    {
        $response = $this->get("api/clients/".$this->client->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => $this->client->first_name,
            'last_name' => $this->client->last_name,
            'birth_date' => $this->client->birth_date,
            'phone_number' => $this->client->phone_number,
            'email' => $this->client->email,
            'employee_id' => $this->client->employee_id,
        ]);
    }

    public function testReadAll()
    {
        $response = $this->get("api/clients");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => $this->client->first_name,
            'last_name' => $this->client->last_name,
            'birth_date' => $this->client->birth_date,
            'phone_number' => $this->client->phone_number,
            'email' => $this->client->email,
            'employee_id' => $this->client->employee_id,
        ]);
    }

    public function testUpdate()
    {
        $response = $this->putJson("api/clients/{$this->client->id}",[
            'firstName' => 'FirstName',
            'lastName' => 'LastName',
            'birthDate' => '2000-01-01',
            'phoneNumber' => '123321213',
            'email' => 'test@example.com',
            'employee'=> '1'
        ]);

        $response->assertStatus(200);
    }
    public function testDelete()
    {
        $response = $this->delete("api/clients/".$this->client->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('clients', ['id' => $this->client->id]);
    }

    private function createClient():Client {
        return Client::factory()->create([
            'employee_id' => 1
        ]);
    }
    private function createEmployee():Employee {
        return Employee::factory()->create([
            'id' => 1
        ]);
    }

}
