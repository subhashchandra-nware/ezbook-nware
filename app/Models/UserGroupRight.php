<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupRight extends Model
{
    use HasFactory;
    protected $table = 'Usergrouprights';

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = null;

    protected  $primaryKey = 'ID';

    protected $fillable = [
        'Resource', 'PermissionType', 'GroupID', 'CreatedBy',
        // 'CreatedDate'
    ];

    public function batch()
    {
        return $this->hasMany($this);
    }


    /**
     * END::CLASS
     */
}
