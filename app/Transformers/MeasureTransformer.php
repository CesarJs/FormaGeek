<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Measure;

/**
 * Class MeasureTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class MeasureTransformer extends TransformerAbstract
{
    /**
     * Transform the Measure entity.
     *
     * @param \Treina\Models\Models\Measure $model
     *
     * @return array
     */
    public function transform(Measure $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
