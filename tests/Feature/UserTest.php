<?php

namespace Tests\Feature;

use App\RosReestraInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * test
     */
    public function testApi()
    {
        $this->get('/api/plots/69:27:0000022:1306')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [ 'c_n', 'address', 'cost', 'area', 'created_at', 'updated_at'],
            ]);
    }

    /**
     * test
     */
    public function testWeb()
    {
        $this->get('/')
            ->assertStatus(200);
    }

}
