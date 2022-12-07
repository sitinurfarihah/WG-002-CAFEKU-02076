<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Kategori;
use Tests\TestCase;

class Usertest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_kategori()
    {
        $response = Kategori::create([
            'nama' => 'test'
        ]);

        $response->assertStatus(302);
    }
}
