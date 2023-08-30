<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ResourceType extends Model
{
    use HasFactory;
    protected $table = 'resourcetype';
    protected  $primaryKey = 'id';

    protected $fillable = [
        'ProviderID',
        'Name',
        'Description',
        'configurationType',
        'AdditionalInfoDefaultText',
        'AdditionalEmailText',
        'created_at',
        'updated_at'
    ];

    function resources() : HasMany
    {
        // return $this->through('environments')->has('deployments');
        return $this->hasMany(Resource::class, 'resourceType', 'id');
    }

    public function SubResources() : HasManyThrough
    {
        // return $this->through('environments')->has('deployments');
        return $this->hasManyThrough(
            SubResource::class,
            Resource::class,
            'resourceType', // Foreign key on the environments table...
            'resource', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'ID' // Local key on the environments table...
        );
    }





/**
 * END::CLASS
 */
}
