<?php

namespace Treina\Models\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Models\Measures;

/**
 * Class MeasuresTransformer.
 *
 * @package namespace Treina\Models\Transformers;
 */
class MeasuresTransformer extends TransformerAbstract
{
    /**
     * Transform the Measures entity.
     *
     * @param \Treina\Models\Models\Measures $model
     *
     * @return array
     */
    public function transform(Measures $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
