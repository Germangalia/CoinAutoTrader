<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 17/05/16
 * Time: 19:14.
 */
namespace App\Http\Controllers\Transformers;

abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    abstract public function transform($item);
}
