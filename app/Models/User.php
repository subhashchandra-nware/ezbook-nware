<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    //public $timestamps= false;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'Name',
        'LoginName',
        'Password',
        'PhoneNumbers',
        'EmailAddress',
        'AdminLevel',
        'Description',
        'ManageUsers',
        'ManageFacilities',
        'ManageSysSettings',
        'CollectiveBookings',
        'CancelBookings',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userType(): HasOne
    {
        return $this->hasOne(UserType::class, 'id', 'AdminLevel');
    }

    /**
     * Get the booking associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function booking(): HasOne
    {
        return $this->hasOne(Book::class, 'BookedBy', 'id');
    }

    /**
     * The FacProviders that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function FacProviders(): BelongsToMany
    {
        return $this->belongsToMany(FacProvider::class, 'user_provider_mapping', 'UserId', 'ProviderId');
    }



    /**
     * Get all of the FacProviders for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function FacProviders(): HasManyThrough
    // {
    //     return $this->hasManyThrough(FacProvider::class, UserProviderMapping::class, 'UserId', 'id', 'id', 'ProviderId');
    // }




    /**
     * END::CLASS
     */
}
