<?php

namespace Treina\Models\Presenters;

use Treina\Models\Transformers\DietTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DietPresenter.
 *
 * @package namespace Treina\Models\Presenters;
 */
class DietPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DietTransformer();
    }
}
