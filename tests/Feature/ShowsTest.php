<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Show;

class ShowsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function an_authenticated_user_can_create_shows()
    // {
    //     $this->signIn();

    //     $thread = make('App\Thread');
    //     $response = $this->post('/threads', $thread->toArray());
    //     $this->get($response->headers->get('Location'))
    //          ->assertSee($thread->title)
    //          ->assertSee($thread->body);
    // }

    /** @test */
    public function anonymous_user_can_see_enabled_shows()
    {
        $show = create('App\Show');
        $response = $this->get('/api/shows');
        $data = $response->getData();
        $this->assertEquals($show->venue, $data->data[0]->venue);
    }

    /** @test */
    public function anonymous_user_can_not_see_disabled_shows()
    {
        $show = create('App\Show', ['enabled' => false]);
        $response = $this->get('/api/shows');
        $data = $response->getData();
        $this->assertEmpty($data->data);
    }

    /** @test */
    public function authenticated_user_can_delete_show()
    {
        $this->signIn();
        $show = create('App\Show', ['enabled' => false]);
        $response = $this->delete("/show/{$show->id}/delete");
        $this->assertEmpty(Show::find($show->id));
    }

    /** @test */
    public function anonymous_user_can_not_delete_show()
    {
        $this->withExceptionHandling();

        $show = create('App\Show', ['enabled' => false]);
        $response = $this->delete("/show/{$show->id}/delete");
        $this->assertNotEmpty(Show::find($show->id));
    }
}
