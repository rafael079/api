<?php

namespace Tests\Feature;

use App\Models\Products;
use App\Models\Stores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /*public function test_add_products() {
        $response = $this->call('POST', '/api/products', ['name' => 'Moto Z', 'price' => 300, 'active' => true, 'store_id' => 4]);
        $response->assertCreated();
    }*/

    public function testListProducts()
    {
        $response = $this->json('GET', route('products.index'), [], [], [])->assertStatus(200);
    }

    public function testProductShow()
    {
        $product = Products::factory()->create();

        $this->json('GET', route('products.show', $product->id), [], [], [])->assertStatus(200);
    }

    public function testProductStore()
    {
        $stores = Stores::get()->last();

        $data = [
            'name' => "Smartphone",
            'price' => 400,
            'active' => false,
            'store_id'=> $stores->id,
        ];

        $response = $this->json('POST', route('products.post'), $data, [], [])->assertStatus(201);
	}

    public function testProductUpdate()
    {
        $product = Products::factory()->create();

        $data = [
            'name' => "Smartphone Editado",
            'price' => 4000,
            'active' => true,
            'store_id'=> $product->store_id,
        ];
        
        $this->json('PUT', route('products.update', $product->id), $data, [], [])->assertStatus(200);
    }

    public function testProductDelete()
    {
        $product = Products::factory()->create();

        $this->json('DELETE', route('products.delete', $product->id), [], [], [])->assertStatus(204);
    }

}
