<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\HelperController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $name
 * @property string|null $street
 * @property string|null $additional_info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAdditionalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $house
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHouse($value)
 * @property string $identifier
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereIdentifier($value)
 * @property-read \App\Models\Areas|null $area
 * @property-read \App\Models\Cities|null $city
 */
class Address extends Model
{
    use HasFactory;

    public function getMyAddresses(Request $request)
    {
        return $this->where('identifier', (new \App\Http\Controllers\Helpers\HelperController)->getIp() ?? $request->ip())->orderBy('name')->get();
    }

    /**
     * @return string
     */
    public function formatAddress(): string
    {
        $address = [
            'city' => $this->city->name,
            'area' => $this->area->name,
        ];
        if ($this->street) {
            $address['street'] = $this->street;
        }
        if ($this->house) {
            $address['house'] = $this->house;
        }

        return implode(', ', $address);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Areas::class, 'area_id', 'id');
    }
}
