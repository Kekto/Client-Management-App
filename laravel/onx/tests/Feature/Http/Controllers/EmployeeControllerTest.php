<?php

namespace Http\Controllers;

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp():void{
        parent::setUp();
        $this->employee = $this->createEmployee();
    }
    public function testCreate()
    {
        $response = $this->postJson('api/employees', [
            'firstName' => $this->employee->first_name,
            'lastName' => $this->employee->last_name,
        ]);

        $response->assertStatus(201)->assertJson(['Message' => 'Employee created successfuly']);
    }

    public function testRead()
    {
        $response = $this->get("api/employees/".$this->employee->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => $this->employee->first_name,
            'last_name' => $this->employee->last_name,
        ]);
    }

    public function testReadAll()
    {
        $response = $this->get("api/employees");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => $this->employee->first_name,
            'last_name' => $this->employee->last_name,
        ]);
    }


    public function testUpdate()
    {
        $response = $this->putJson("api/employees/{$this->employee->id}",[
            'firstName' => 'FirstName',
            'lastName' => 'LastName',
        ]);

        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->delete("api/employees/".$this->employee->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('employees', ['id' => $this->employee->id]);
    }

    private function createEmployee():Employee {
        return Employee::factory()->create([
            'id' => 1
        ]);
    }
}
