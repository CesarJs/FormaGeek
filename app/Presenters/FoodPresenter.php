<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\FoodTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FoodPresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class FoodPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FoodTransformer();
    }
}
