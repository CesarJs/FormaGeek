<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\MeasureTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MeasurePresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class MeasurePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MeasureTransformer();
    }
}
