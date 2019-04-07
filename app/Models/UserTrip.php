<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTrip.
 */
class UserTrip extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return array
     */
    public function getFromPlaceAttribute()
    {
        return Cache::rememberForever("user_trip_{$this->id}_from_geo", function () {
            return (array) geo_client()->get([
                'geonameId' => $this->from_geo_name_id,
                'lang' => 'ru',
            ]);
        });
    }

    /**
     * @return array
     */
    public function getToPlaceAttribute()
    {
        return Cache::rememberForever("user_trip_{$this->id}_to_geo", function () {
            return (array) geo_client()->get([
                'geonameId' => $this->to_geo_name_id,
                'lang' => 'ru',
            ]);
        });
    }
}
