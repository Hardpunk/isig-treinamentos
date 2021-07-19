<?php

namespace App;

use DateTimeInterface;
use Eloquent as Model;

/**
 * Class Newsletter
 * @package App\Models
 * @version July 16, 2021, 6:12 pm -03
 *
 */
class Newsletter extends Model
{
    public $table = 'newsletters';

    public $fillable = [
        'email',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|email',
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
