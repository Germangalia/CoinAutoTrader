<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\Http\Controllers\PartialsAutoTrader\CodeRefactorManager;
use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;
use App\Http\Controllers\PartialsAutoTrader\DatabaseManager;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Vinkla\Alert\Facades\Alert;

/**
 * CoinAutotrader accounts controller
 * Class AccountsController.
 */
class AccountsController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @var CoinBaseManager
     */
    private $coinBaseManager;

    /**
     * @var CodeRefactorManager
     */
    private $codeRefactorManager;

    /**
     * AccountsController constructor.
     *
     * @param DatabaseManager     $databaseManager
     * @param CoinBaseManager     $coinBaseManager
     * @param CodeRefactorManager $codeRefactorManager
     */
    public function __construct(DatabaseManager $databaseManager, CoinBaseManager $coinBaseManager, CodeRefactorManager $codeRefactorManager)
    {
        $this->coinBaseManager = $coinBaseManager;
        $this->databaseManager = $databaseManager;
        $this->codeRefactorManager = $codeRefactorManager;
    }

    /**
     * View the acounts blade.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('layouts/accounts');
    }

    /**
     * Create new account.
     *
     * @param Request $requests
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createAccount(Request $requests)
    {
        if ($requests->title != '' && is_numeric($requests->initialCapital)) {
            //Select Authenticated user and create client
            $client = $this->coinBaseManager->createClientFromUser();

            //Create account
            $account = $this->coinBaseManager->createAccount($client, $requests->title);

            //Get Primary Address from account
            $address = $this->coinBaseManager->createAddress($client, $account);

            //Get values
            $name = $requests->title;
            $user_id = Auth::user()->id;
            $account_id = $account->getId();
            $wallet_address = $address->getAddress();
            $balance = $account->getBalance()->getAmount();
            $initial_capital = $requests->initialCapital;
            $active = false;

            //Save to accounts database
            $this->databaseManager->insertAccounts($name, $user_id, $account_id, $wallet_address, $balance, $initial_capital, $active);

            //Send alert to view
            Alert::info('Congratulations! Your new account is ready to activate.');
        } else {
            //Send alert to view
            Alert::danger('Please, insert correct values in the form fields.');
        }

        return view('layouts/accounts');
    }

    /**
     * Get all user accounts.
     *
     * @return mixed
     */
    public function getUserAccounts()
    {
        //Get accounts from database
        $userAccounts = $this->databaseManager->getUserAccounts();

        return $userAccounts;
    }

    /**
     * Get the active accounts of the user.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activateAccounts($id)
    {
        //Get account details
        $accountRecord = AccountsCoinBase::findOrFail($id);

        //Check the values
        $result = $this->codeRefactorManager->checkActiveAccount($id, $accountRecord);

        //Check result
        if ($result == true) {
            Alert::success('The account is activate to trade.');
        } else {
            Alert::warning('The account is disable to trade.');
        }

        //Return accounts view
        return view('layouts/accounts');

    }

    /**
     * Delete account by id.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleteAccounts($id)
    {
        //Delete from database
        AccountsCoinBase::destroy($id);

        //Send alert to view
        Alert::danger('The account is delete.');

        //Return accounts view
        return view('layouts/accounts');
    }
}
