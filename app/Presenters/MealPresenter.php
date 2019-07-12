<?php

namespace Treina\Presenters;

use Treina\Transformers\MealTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MealPresenter.
 *
 * @package namespace Treina\Presenters;
 */
class MealPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MealTransformer();
    }
}
