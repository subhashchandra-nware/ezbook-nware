<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected  $primaryKey = 'ID';

    const CREATED_AT = 'CreatedDate';
    // const UPDATED_AT = null;

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
}
