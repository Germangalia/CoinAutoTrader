<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test home page view by user
     */
    public function testHomePageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->see('You are logged in CoinAutoTrader!');
    }


    /**
     * Test home page view without user.
     */
    public function testHomePageViewWithoutUser()
    {
        $this->visit('/home')
            ->seePageIs('login');
    }

}