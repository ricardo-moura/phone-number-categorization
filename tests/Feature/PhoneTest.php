<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    /** @test */
    public function should_list_phone_numbers()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
