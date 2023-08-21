<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    function resource() : HasMany {

        return $this->hasMany(Resource::class, 'resourceType', 'id');
    }






/**
 * END::CLASS
 */
}
