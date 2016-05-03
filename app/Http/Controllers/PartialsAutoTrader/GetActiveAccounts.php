<?php


class GetActiveAccounts
{
    
    //Active Accounts Collection
    private $activeAccounts;


    /**
     * GetActiveAccounts constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * @return mixed
     */
    public function getActiveAccounts()
    {
        return $this->activeAccounts;
    }

    /**
     * @param mixed $activeAccounts
     */
    public function setActiveAccounts($activeAccounts)
    {
        $this->activeAccounts = $activeAccounts;
    }

    /*
     * Get all active account from all users and return the array collection
     * @return mixed
     */
    public function getAccounts()
    {
        $this->activeAccounts = DB::table('accounts_coin_bases')->where('active' == true)->get();
        return $this->activeAccounts;
    }

}