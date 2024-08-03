<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Practice
 *
 * @property int $id
 * @property string $title タイトル
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PracticeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Practice extends Model
{
    use HasFactory;
}
