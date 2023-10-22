<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResourceTypeLimit extends Model
{
    use HasFactory;
    protected $table = 'resourcetypelimit';
    public $timestamps= false;
    protected $fillable = [
        'resourcetype',
        'LimitType',
        'Limit',
        'GroupAppliedTo',
    ];

    /**
     * Get the ResourceTypeLimitFields that owns the ResourceTypeLimit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ResourceTypeLimitFields(): BelongsTo
    {
        return $this->belongsTo(ResourceTypeLimitField::class, 'LimitType', 'id');
    }

    /**
     * Get the UserGroups that owns the ResourceTypeLimit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function UserGroups(): BelongsTo
    {
        return $this->belongsTo(UserGroup::class, 'GroupAppliedTo', 'id');
    }






}
