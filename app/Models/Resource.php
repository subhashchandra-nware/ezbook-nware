<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resource';

    protected  $primaryKey = 'ID';

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    protected $fillable = [
        'resourceType',
        'resourceLocation',
        'ProviderID',
        'Name',
        'Description',
        'CreatedBy',
        'FacURL',
        'ModFeatureEnabled',
        'BookingRights',
        'ViewingRights',
        'ModRights',
        'RequestRights',
        'SlotLength',
        'EmailRecipients',
        'ModEmailRecipients',
        'PublicView',
        // 'CreatedDate',
        'MultiEntity',
        'BookingAdditionalInfo',
    ];

    public function usersRight() : HasMany
    {
        return $this->hasMany(\App\Models\UserRight::class, 'Resource', 'ID');
    }

    public function userGroupsRight() : HasMany
    {
        return $this->hasMany(UserGroupRight::class, 'Resource', 'ID');
    }

    public function operationhours() : HasMany
    {
        return $this->hasMany(OperationHour::class, 'Resource', 'ID');
    }

    public function customBookingInfo() : HasMany
    {
        return $this->hasMany(CustomBookingInfo::class, 'Resource', 'ID');
    }

    public function SubResources() : HasMany
    {
        return $this->hasMany(SubResource::class, 'resource', 'ID');
    }

    public function Bookings() : HasMany
    {
        return $this->hasMany(Booking::class, 'FacID', 'ID');
    }



   /**
    * Get the ResourceType associated with the Resource
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function ResourceTypes() : HasOne
   {
       return $this->hasOne(ResourceType::class, 'id', 'resourceType')->withDefault();
   }

   /**
    * Get the user associated with the Resource
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function user(): HasOne
   {
       return $this->hasOne(User::class, 'id', 'CreatedBy')->withDefault();
   }







    /**
     * END::CLASS
     */
}
