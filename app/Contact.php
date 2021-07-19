<?php

namespace App;

use DateTimeInterface;
use Eloquent as Model;

/**
 * Class Contact
 * @package App\Models
 * @version July 16, 2021, 6:12 pm -03
 *
 */
class Contact extends Model
{
    public $table = 'contacts';

    public $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'message' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'g-recaptcha-response' => 'recaptcha',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y H:i:s');
    }

}
