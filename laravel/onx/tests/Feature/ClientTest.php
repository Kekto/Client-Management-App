<?php

namespace Tests\Feature;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Tests\Unit\factory;

class ClientTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testStore()
    {
//        $employee = Employee::factory()->create();

    }
    public function testShow()
    {

    }

    public function testUpdate()
    {

    }

    public function testDestroy()
    {

    }
}
