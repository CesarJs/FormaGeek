<?php

namespace Treina\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Meal.
 *
 * @package namespace Treina\Models;
 */
class Meal extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    public function diets()
    {
        return $this->belongsToMany('Treina\Models\Diet','diet_meal');
    }

}
