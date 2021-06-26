<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
//use PHPUnit\Framework\TestCase;

class CheckPathTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
}
