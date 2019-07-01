<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Diets;

/**
 * Class DietsTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class DietsTransformer extends TransformerAbstract
{
    /**
     * Transform the Diets entity.
     *
     * @param \Treina\Models\Models\Diets $model
     *
     * @return array
     */
    public function transform(Diets $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
