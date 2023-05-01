<?php

namespace Http\Controllers;

use App\Http\Controllers\OrderController;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp():void{
        parent::setUp();
        $this->employee = $this->createEmployee();
        $this->client = $this->createClient();
        $this->order = $this->createOrder();
    }
    public function testCreate()
    {
        $response = $this->postJson('api/orders', [
            'itemName' => $this->order->item_name,
            'quantity' => $this->order->quantity,
            'price' => $this->order->price,
            'clientId' => $this->order->client_id,
        ]);

        $response->assertStatus(201)->assertJson(['Message' => 'Order created successfuly']);
    }

    public function testRead()
    {
        $response = $this->get("api/orders/".$this->order->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'item_name' => $this->order->item_name,
            'quantity' => $this->order->quantity,
            'price' => $this->order->price,
            'client_id' => $this->order->client_id,
        ]);
    }

    public function testReadAll()
    {
        $response = $this->get("api/orders");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'item_name' => $this->order->item_name,
            'quantity' => $this->order->quantity,
            'price' => $this->order->price,
            'client_id' => $this->order->client_id,
        ]);
    }


    public function testUpdate()
    {
        $response = $this->putJson("api/orders/{$this->order->id}",[
            'itemName' => 'ItemName',
            'quantity' => '1',
            'price' => '19.99',
            'clientId' => '1',
        ]);

        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->delete("api/orders/".$this->order->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('orders', ['id' => $this->order->id]);
    }

    private function createEmployee():Employee {
        return Employee::factory()->create([
            'id' => 1
        ]);
    }

    private function createClient():Client {
        return Client::factory()->create([
            'id'=> 1,
            'employee_id' => 1
        ]);
    }
    private function createOrder():Order {
        return Order::factory()->create([
            'id'=> 1,
            'client_id' => 1
        ]);
    }

}
