<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatisticsTotalEvolutionPageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test statistics total evolution page view by user.
     */
    public function testTotalEvolutionPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/statistics/total-evolution')
            ->see('Benefit Evolution')
            ->see('Select an account:')
            ->see('Load Graphic');
    }

    /**
     * Test statistics total evolution page view without user.
     */
    public function testTotalEvolutionPageViewWithoutUser()
    {
        $this->visit('/statistics/total-evolution')
            ->seePageIs('login');
    }
}
