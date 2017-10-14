<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogsTest extends TestCase
{
    use RefreshDatabase;
    
        /** @test */
        public function api_returns_all_data()
        {
            $press = create('App\Blog');
            $response = $this->get('/api/press');
            $data = $response->getData();
            $this->assertEquals(
                array_keys(get_object_vars($data->data[0])),
                ['title', 'source', 'link', 'date']
            );
        }
}
