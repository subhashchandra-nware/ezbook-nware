<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomAttributesFields extends Model
{
    use HasFactory;
    protected $table = 'customattributefields';
    public $timestamps= false;
    protected $fillable = [
        'resourcetype',
        'Name',
        'FieldType',
        'Description',
        'Require',
    ];

    /**
     * Get the CustomAttributesFieldTypes that owns the CustomAttributesFields
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CustomAttributesFieldTypes(): BelongsTo
    {
        return $this->belongsTo(CustomAttributesFieldType::class, 'FieldType', 'ID');
    }




}
