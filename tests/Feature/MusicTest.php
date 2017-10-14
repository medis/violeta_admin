<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MusicTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function api_returns_all_data()
    {
        $music = create('App\Music');
        $response = $this->get('/api/music');
        $data = $response->getData();
        $this->assertEquals(
            array_keys(get_object_vars($data->data[0])),
            ['title', 'source', 'type', 'featured']
        );
    }
}
