<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AccountsPageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test accounts page view by user.
     */
    public function testAccountsPageView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/accounts')
            ->see('Title')
            ->see('Initial capital');
    }

    /**
     * Test accounts page view without user.
     */
    public function testAccountsPageViewWithoutUser()
    {
        $this->visit('/accounts')
            ->seePageIs('login');
    }

    /**
     * Test accounts page view make account in form.
     */
    public function testMakeAccountInAccountsPage()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/accounts')
            ->type('Example Account', 'title')
            ->type(10500, 'initialCapital')
            ->press('Create Account')
            ->see('Congratulations! Your new account is ready to activate.');
    }

    /**
     * Test accounts page view activate button.
     */
    public function testActivateAccountInAccountsPage()
    {
        //        $user = factory(App\User::class)->create();
//
//        $this->actingAs($user)
//            ->visit('/accounts')
//            ->press('Activate/Disable')
//            ->see('1');
    }

    /**
     * Test accounts page view delete button.
     */
    public function testDelateAccountInAccountsPage()
    {
        //        $user = factory(App\User::class)->create();
//
//        $this->actingAs($user)
//            ->visit('/accounts')
//            ->press('Remove')
//            ->press('Aceptar')
//            ->see('Congratulations! Your new account is ready to activate.');
    }
}
