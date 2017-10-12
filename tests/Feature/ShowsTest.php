<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Carbon\Carbon;

use App\Show;

class ShowsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function authenticated_user_can_create_shows()
    {
        $this->signIn();

        $show = make('App\Show', ['date' => Carbon::now(+1)]);
        $show_array = $show->toArray();
        $show_array['time'] = $show_array['date']->format('H:i');
        $show_array['date'] = $show_array['date']->format('Y-m-d');
        $response = $this->post(route('show.store'), $show_array);

        $show_in_db = Show::where('venue', $show->venue)
                          ->get();

        $this->assertNotEmpty($show_in_db);
    }

    /** @test */
    public function anonymous_user_can_not_create_shows()
    {
        $show = make('App\Show', ['date' => Carbon::now(+1)]);
        $show_array = $show->toArray();
        $show_array['time'] = $show_array['date']->format('H:i');
        $show_array['date'] = $show_array['date']->format('Y-m-d');
        $response = $this->post('/shows/create', $show_array);

        $show_in_db = Show::where('venue', $show->venue)
                          ->get();

        $this->assertEmpty($show_in_db);
    }

    /** @test */
    public function anonymous_user_can_see_enabled_shows()
    {
        $show = create('App\Show', ['date' => Carbon::now(+1)]);
        $response = $this->get('/api/shows');
        $data = $response->getData();
        $this->assertEquals($show->venue, $data->data[0]->venue);
    }

    /** @test */
    public function anonymous_user_can_not_see_disabled_shows()
    {
        $show = create('App\Show', ['date' => Carbon::now(+1), 'enabled' => false]);
        $response = $this->get('/api/shows');
        $data = $response->getData();
        $this->assertEmpty($data->data);
    }

    /** @test */
    public function authenticated_user_can_delete_show()
    {
        $this->signIn();
        $show = create('App\Show', ['date' => Carbon::now(+1), 'enabled' => false]);
        $response = $this->delete(route('show.destroy', $show->id));
        $this->assertEmpty(Show::find($show->id));
    }

    /** @test */
    public function anonymous_user_can_not_delete_show()
    {
        $show = create('App\Show', ['date' => Carbon::now(+1), 'enabled' => false]);
        $response = $this->delete("/show/{$show->id}/delete");
        $this->assertNotEmpty(Show::find($show->id));
    }
}
