<?php

namespace App\Events;

use App\Models\Countries;
use App\Models\Log;
use GeoIp2\Model\Country;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Stevebauman\Location\Facades\Location;

class LogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $log;

    /**
     * Create a new event instance.
     */
    public function __construct($log)
    {
        $ip = request()->ip();
        $location = Location::get('https://'. $ip);

        $country = Countries::where('code', $location->countryCode)->first();
        // dd($location, $location->countryCode, $country);
        $default = ['userName' => 'unknown', 'ip' => request()->ip(), 'result' => 'unknown', 'country' => $country->name??$location->countryName];
        $log = array_merge($default, $log);
        $this->log = $log;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    // public function broadcastOn(): array
    // {
    //     return [
    //         new PrivateChannel('channel-name'),
    //     ];
    // }



}
