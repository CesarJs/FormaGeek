<?php

namespace Treina\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Meal;

/**
 * Class MealTransformer.
 *
 * @package namespace Treina\Transformers;
 */
class MealTransformer extends TransformerAbstract
{
    /**
     * Transform the Meal entity.
     *
     * @param \Treina\Models\Meal $model
     *
     * @return array
     */
    public function transform(Meal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
