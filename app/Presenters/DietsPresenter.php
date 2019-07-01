<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\DietsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DietsPresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class DietsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DietsTransformer();
    }
}
