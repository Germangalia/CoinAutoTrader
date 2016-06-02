<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatisticsBitcoinsPageEvolutionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test statistics bitcoins evolution page view by user.
     */
    public function testBitcoinsEvolutionPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/statistics/bitcoins-evolution')
            ->see('Bitcoins Evolution')
            ->see('Select an account:');
    }

    /**
     * Test statistics bitcoins evolution page view without user.
     */
    public function testBitcoinsEvolutionPageViewWithoutUser()
    {
        $this->visit('/statistics/bitcoins-evolution')
            ->seePageIs('login');
    }
}
