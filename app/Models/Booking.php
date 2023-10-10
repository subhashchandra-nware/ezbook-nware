<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    // protected $table = 'bookings';

    protected  $primaryKey = 'ID';

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = null;

    protected $fillable = [
        'BookedBy' ,
        'SubID' ,
        'FacID' ,
        'RepeatGroup' ,
        'BookingType' ,
        'BookedFor' ,
        'FromTime' ,
        'ToTime' ,
        'Cancelled' ,
        'Purpose' ,
        'NoPlaces' ,
        'AllBooking' ,
        'ModeratedBy' ,
        'ModeratedByName' ,
        // 'CreateDate'
    ];


    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'BookedBy', 'id')->withDefault();
    }


}
