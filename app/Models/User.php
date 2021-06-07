<?php

namespace App\Models;

use App\Payment;
use App\UserProfile;
use DateTimeInterface;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User
 * @package App\Models
 * @version February 17, 2021, 11:04 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $payments
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class User extends Model
{

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'email' => 'required|email|string',
        'email_verified_at' => 'nullable',
        'password' => 'required|string',
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y H:i:s');
    }

    /**
     * @return HasMany
     **/
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    /**
     * User Profile
     *
     * @return HasOne
     */
    public function Profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
