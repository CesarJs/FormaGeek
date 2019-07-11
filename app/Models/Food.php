<?php

namespace Treina\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Food.
 *
 * @package namespace Treina\Models\Models;
 */
class Food extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    		'user_id',
			'name',
			'calories',
			'proteins',
			'carbo',
			'fiber',
			'sodium',
			'potassium',
			'cholesterol',
			'fat',
			'value_biologic',
			'status',
    ];

}
