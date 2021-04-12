<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cities
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cities extends Model
{
    use HasFactory;
}
