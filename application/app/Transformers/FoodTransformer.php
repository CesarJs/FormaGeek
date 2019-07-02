<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Food;

/**
 * Class FoodTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class FoodTransformer extends TransformerAbstract
{
    /**
     * Transform the Food entity.
     *
     * @param \Treina\Models\Models\Food $model
     *
     * @return array
     */
    public function transform(Food $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
