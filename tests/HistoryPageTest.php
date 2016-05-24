<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class HistoryControllerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test history page view by user
     */
    public function testHistoryPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/history')
            ->see('Search')
            ->see('Coin Price');
    }


    /**
     * Test history page view without user.
     */
    public function testHistoryPageViewWithoutUser()
    {
        $this->visit('/history')
            ->seePageIs('login');
    }
}