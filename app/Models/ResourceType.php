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

    public function resources() : HasMany
    {
        // return $this->through('environments')->has('deployments');
        return $this->hasMany(Resource::class, 'resourceType', 'id');
    }

    public function SubResources() : HasManyThrough
    {
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
     * Get all of the CustomAttributesFields for the ResourceType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CustomAttributesFields(): HasMany
    {
        return $this->hasMany(CustomAttributesFields::class, 'resourcetype', 'id');
    }

    /**
     * Get all of the ResourceTypeLimits for the ResourceType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ResourceTypeLimits(): HasMany
    {
        return $this->hasMany(ResourceTypeLimit::class, 'resourcetype', 'id');
    }





/**
 * END::CLASS
 */
}
