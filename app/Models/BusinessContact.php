<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessContact
 * @package App\Models
 * @version July 16, 2021, 6:15 pm -03
 *
 */
class BusinessContact extends Model
{
    use SoftDeletes;

    public $table = 'business_contacts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
