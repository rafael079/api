<?php

namespace Tests\Feature;

use App\Models\Stores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class StoresTest extends TestCase
{

    public function testListStores()
    {
        $response = $this->json('GET', route('stores.index'), [], [], [])->assertStatus(200);
    }

    public function testStoreShow()
    {
        $store = Stores::factory()->create();

        $this->json('GET', route('stores.show', $store->id), [], [], [])->assertStatus(200);
    }

    public function testProductStore()
    {
        $data = [
            'name' => "Loja Padrão",
            'email' => Str::random(8) . '@email.com',
        ];

        $response = $this->json('POST', route('stores.store'), $data, [], [])->assertStatus(201);
    }

    public function testProductUpdate()
    {
        $store = Stores::factory()->create();

        $data = [
            'name' => "Loja Editado",
            'email' => $store->email,
        ];

        $this->json('PUT', route('stores.update', $store->id), $data, [], [])->assertStatus(200);
    }

    public function testBookDelete()
    {
        $store = Stores::factory()->create();

        $this->json('DELETE', route('stores.delete', $store->id), [], [], [])->assertStatus(204);
    }
}
