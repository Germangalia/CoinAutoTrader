<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 17/05/16
 * Time: 20:31.
 */
namespace App\Http\Controllers\PartialsAutoTrader;

class ApiToken
{
    /**
     * Generate the API token of the user.
     *
     * @return static
     */
    public function generateApiToken()
    {
        //Generate API Token
        $apiKey = \Chrisbjr\ApiGuard\Models\ApiKey::make();

        return $apiKey;
    }
}
