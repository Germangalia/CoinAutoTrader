<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatisticsCapitalEvolutionPageTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test statistics capital evolution page view by user
     */
    public function testCapitalEvolutionPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/statistics/capital-evolution')
            ->see('Capital Evolution')
            ->see('Select an account:');
    }


    /**
     * Test statistics capital evolution page view without user.
     */
    public function testCapitalEvolutionPageViewWithoutUser()
    {
        $this->visit('/statistics/capital-evolution')
            ->seePageIs('login');
    }
}