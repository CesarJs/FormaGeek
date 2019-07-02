<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Diet;

/**
 * Class DietTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class DietTransformer extends TransformerAbstract
{
    /**
     * Transform the Diet entity.
     *
     * @param \Treina\Models\Models\Diet $model
     *
     * @return array
     */
    public function transform(Diet $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
