<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookingRecurrence extends Model
{
    use HasFactory;

    protected $table = 'bookingrecurrence';

    protected  $primaryKey = 'ID';

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'userid',
        'recurrenceType',
        'recurrenceInterval',
        'untilDate',
        'daysOfWeek',
        'MonthIntervalDay',
        'MonthIntervalDateSelection',
    ];

    public function Bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'RepeatGroup', 'ID');
    }

    /**
     * END::CLASS
     */
}
