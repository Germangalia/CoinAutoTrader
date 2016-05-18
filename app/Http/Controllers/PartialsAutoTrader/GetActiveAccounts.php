<?php
namespace App\Http\Controllers\PartialsAutoTrader;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GetActiveAccounts extends Controller
{
    /**
     * Active Accounts Collection
     * @var
     */
    private $activeAccounts;


    /**
     * Get active accounts of the user
     * @return mixed
     */
    public function getActiveAccounts()
    {
        return $this->activeAccounts;
    }

    /**
     * Set active accounts of the user
     * @param mixed $activeAccounts
     */
    public function setActiveAccounts($activeAccounts)
    {
        $this->activeAccounts = $activeAccounts;
    }

    /**
     * Get all active account from all users and return the array collection
     * @return mixed
     */
    public function getAccounts()
    {
        $this->activeAccounts = DB::table('accounts_coin_bases')->where('active', true)->get();
        return $this->activeAccounts;
    }
}