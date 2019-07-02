<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Foods;

/**
 * Class FoodsTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class FoodsTransformer extends TransformerAbstract
{
    /**
     * Transform the Foods entity.
     *
     * @param \Treina\Models\Models\Foods $model
     *
     * @return array
     */
    public function transform(Foods $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
