<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\MeasuresTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MeasuresPresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class MeasuresPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MeasuresTransformer();
    }
}
