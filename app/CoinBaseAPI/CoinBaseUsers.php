<?php

class CoinBaseUsers
{

    //Get authorization info
    public function getAuthorizationInfo($client)
    {
        $auth = $client->getCurrentAuthorization();
        return $auth;
    }


    //Lookup user info
    public function lookupUserInfo($client, $userId)
    {
        $user = $client->getUser($userId);
        return $user;
    }


    //Get current user
    public function getCurrentUser($client)
    {
        $user = $client->getCurrentUser();
        return $user;
    }


    //Update current user
    public function updateCurrentUser($client, $user)
    {
        $user->setName('New Name');
        $client->updateCurrentUser($user);
    }

}