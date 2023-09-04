<?php

namespace Tests\Feature;

use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_product()
    {
        $productData = [
            'name' => 'New Product1',
            'description' => 'This is a new product',
            'price' => 9.99,
            'quantity' => 10,
        ];

        $response = $this->post('/', $productData);

        $response->assertStatus(201)->assertJson($productData);

        $this->assertDatabaseHas('tests', $productData);
    }
}
