<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatisticsBenefitEvolutionPageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test statistics benefit evolution page view by user.
     */
    public function testBenefitEvolutionPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/statistics/benefit-evolution')
            ->see('Benefit Evolution')
            ->see('Select an account:');
    }

    /**
     * Test statistics benefit evolution page view without user.
     */
    public function testBenefitEvolutionPageViewWithoutUser()
    {
        $this->visit('/statistics/benefit-evolution')
            ->seePageIs('login');
    }
}
