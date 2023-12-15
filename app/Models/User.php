<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable;
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
        'deleted_at',
        // 'type',
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
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    // protected $visible = ['Name', 'EmailAddress'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Appends Coloumns as alias
     * @var array
     * @author Subhash Chandra <Subhash.Chandra@nwaresoft.com>
     */
    protected $appends = [
        // 'name',
        'email',
        // 'phone',
        // 'password',
        'type'
    ];
    /**
     * getNameAttribute or get alias coloumn of Name
     * @return mixed
     * @author Subhash Chandra <Subhash.Chandra@nwaresoft.com>
     */
    // public function getNameAttribute()
    // {
    //     return $this->attributes['Name'];
    // }

    /**
     * setNameAttribute or set alias coloumn name
     * @param mixed $value
     * @return static
     * @author Subhash Chandra <Subhash.Chandra@nwaresoft.com>
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $value;
    //     return $this;
    // }

    // public function getEmailAttribute()
    // {
    //     return $this->attributes['EmailAddress'];
    // }
    // public function setEmailAddressAttribute($value)
    // {
    //     $this->attributes['email'] = $value;
    //     return $this;
    // }

    // public function getPhoneAttribute()
    // {
    //     // return $this->PhoneNumbers;
    //     return $this->attributes['PhoneNumbers'];
    // }
    // public function setPhoneNumbersAttribute($value)
    // {
    //     $this->attributes['phone'] = $value;
    //     return $this;
    // }


    // public function getPasswordAttribute()
    // {
    //     // return $this->Password;
    //     return $this->attributes['Password'];
    // }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = $value;
    //     return $this;
    // }


    /**
     * Undocumented function
     * @param string $value
     * @return Attribute
     */
    // protected function AdminLevel(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => ['superadmin', 'admin', 'user'][$value],
    //     );
    // }
    protected function type(): Attribute
    {
        return new Attribute(
            // get: fn ($value, $attributes) => ['superadmin', 'admin', 'user'][$this->AdminLevel??0],
            get: fn ($value, $attributes) => ['superadmin', 'admin', 'user'][$attributes['AdminLevel']]
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            // get: fn ($value, $attributes) => print_r($attributes),
            get: fn ($value, $attributes) => $attributes['EmailAddress'],
            set: fn ($value) => ['EmailAddress' => $value],
        );
    }







    public function userType(): HasOne
    {
        return $this->hasOne(UserType::class, 'id', 'AdminLevel');
    }

    /**
     * Get the UserProviderMappings associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function UserProviderMappings(): HasOne
    {
        return $this->hasOne(UserProviderMapping::class, 'UserId', 'id');
    }

    /**
     * Get the UsersInGroups associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function UsersInGroups(): HasOne
    // {
    //     return $this->hasOne(UsersInGroup::class, 'UserID', 'id');
    // }

    /**
     * Get all of the UsersInGroups for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function UsersInGroups(): HasMany
    {
        return $this->hasMany(UsersInGroup::class, 'UserID', 'id');
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
 * The UserGroups that belong to the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */

public function UserGroups(): BelongsToMany
{
    return $this->belongsToMany(UserGroup::class, 'usersingroups', 'UserID', 'GroupID');
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
