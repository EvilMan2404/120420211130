<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Areas
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Areas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Areas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Areas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Areas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Areas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Areas whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Areas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Areas extends Model
{
    use HasFactory;
}
