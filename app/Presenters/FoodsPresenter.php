<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\FoodsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FoodsPresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class FoodsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FoodsTransformer();
    }
}
