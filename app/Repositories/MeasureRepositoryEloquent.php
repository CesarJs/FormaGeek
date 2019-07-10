<?php

namespace Treina\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Treina\Repositories\MeasureRepository;
use Treina\Models\Measure;
use Treina\Validators\MeasureValidator;

/**
 * Class MeasureRepositoryEloquent.
 *
 * @package namespace Treina\Models\Repositories;
 */
class MeasureRepositoryEloquent extends BaseRepository implements MeasureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Measure::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MeasureValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
