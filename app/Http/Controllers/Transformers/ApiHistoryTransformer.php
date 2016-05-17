<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 17/05/16
 * Time: 19:12
 */

namespace App\Http\Controllers\Transformers;


class ApiHistoryTransformer extends Transformer
{
    public function transform($object)
    {
        return [
            'user_id' => $object['user_id'],
            'account_id' => $object['account_id'] ,
            'initial_capital' => $object['initial_capital'],
            'coin_price' => $object['coin_price'],
            'coins' => $object['coins'] ,
            'coins_value' => $object['coins_value'],
            'cfav' => $object['cfav'],
            'capital' => $object['capital'],
            'portfolio_control' => $object['portfolio_control'],
            'buy_sell_advice' => $object['buy_sell_advice'],
            'market_order' => $object['market_order'],
            'coin_market_order' => $object['coin_market_order'],
            'commission' => $object['commission'],
            'coins_amount' => $object['coins_amount'],
            'capital_amount' => $object['capital_amount'],
            'total_amount' => $object['total_amount'],
            'benefit' => $object['benefit']
        ];
    }
}
