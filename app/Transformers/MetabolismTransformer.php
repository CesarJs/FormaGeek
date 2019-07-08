<?php

namespace Treina\Transformers;

use League\Fractal\TransformerAbstract;
use Treina\Models\Metabolism;

/**
 * Class MetabolismTransformer.
 *
 * @package namespace Treina\Transformers;
 */
class MetabolismTransformer extends TransformerAbstract
{
    /**
     * Transform the Metabolism entity.
     *
     * @param \Treina\Models\Metabolism $model
     *
     * @return array
     */
    public function transform(Metabolism $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
