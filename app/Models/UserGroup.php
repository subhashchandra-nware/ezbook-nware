<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'usergroups';

    protected $fillable = [
        'id',
        'ProviderID',
        'Name',
        'Description',
        'CreatedBy',
        'created_at',
        'updated_at'
    ];

    /**
     * The Users that belong to the UserGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'usersingroups', 'GroupID', 'UserID');
    }


    /**
     * Get all of the UsersInGroups for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function UsersInGroups(): HasMany
    {
        return $this->hasMany(UsersInGroup::class, 'GroupID', 'id');
    }

    /**
     * END::CLASS
     */
}
