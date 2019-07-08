<?php

namespace Treina\Presenters;

use Treina\Transformers\MetabolismTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MetabolismPresenter.
 *
 * @package namespace Treina\Presenters;
 */
class MetabolismPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MetabolismTransformer();
    }
}
