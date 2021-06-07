<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    public $table = 'plans';

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'slug' => 'required|unique:coupons',
        'amount' => 'required',
        'installment_amount' => 'required',
        'months' => 'required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'amount' => 'float',
        'installment_amount' => 'float',
        'months' => 'integer'
    ];

}
