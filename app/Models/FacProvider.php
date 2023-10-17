<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FacProvider extends Model
{
    use HasFactory;
    protected $table = 'facproviders';
    // public $timestamps= false;

    protected $fillable = [
        'Name',
        'LoginName',
        'ContactName',
        'ContactEmail',
        'HomeURL',
        'ExpiryDate',
        'AccountStatus',
        'TimeZone',
        'IsVerified',
        'IsBusinessProfileUpdated',
        'CreatedBy'
    ];

    public static function currentSite(){
        if(session()->has('siteId')){
            $siteId = session()->get('siteId');
            return FacProvider::where('id',$siteId)->first();
        }
    }

    /**
     * The Users that belong to the FacProvider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_provider_mapping', 'ProviderId', 'UserId');
    }

    /**
     * END::CLASS
     */
}
