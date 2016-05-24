<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatisticsIndexPageTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test statistics index page view by user
     */
    public function testStatisticsIndexPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/statistics/index')
            ->see('Statistics Index')
            ->see('UPLOAD')
            ->see('Average Total Amount');
    }


    /**
     * Test statistics index page view without user.
     */
    public function testStatisticsIndexPageViewWithoutUser()
    {
        $this->visit('/statistics/index')
            ->seePageIs('login');
    }
}