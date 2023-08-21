<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRight extends Model
{
    use HasFactory;
    protected $table = 'Userrights';
    protected  $primaryKey = 'ID';
    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = null;

    protected $fillable = [
        'Resource', 'PermissionType', 'UserID','CreatedBy',
            // 'CreatedDate'
    ];

    // public function resource() //: BelongsTo
    //  {
    //     return $this->belongsTo(Resource::class);
    // }



    /**
     * END::CLASS
     */
}
