<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 17/05/16
 * Time: 20:12
 */

namespace App\Http\Controllers\Transformers;


class ApiValueTransformer extends Transformer
{
    public function transform($object)
    {
        return [
            'value' => $object
        ];
    }
}