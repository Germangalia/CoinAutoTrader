<?php

class CoinBaseUsers
{

    //Get authorization info
    public function getAuthorizationInfo($client)
    {
        $auth = $client->getCurrentAuthorization();
    }


    //Lookup user info
    public function lookupUserInfo($client, $userId)
    {
        $user = $client->getUser($userId);
    }


    //Get current user
    public function getCurrentUser($client)
    {
        $user = $client->getCurrentUser();
    }


    //Update current user
    public function updateCurrentUser($client, $user)
    {
        $user->setName('New Name');
        $client->updateCurrentUser($user);
    }

}