<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $title 映画タイトル
 * @property string $image_url 画像URL
 * @property int $published_year 公開年
 * @property string $description 概要
 * @property int $is_showing 上映中かどうか
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $genre_id
 * @method static \Database\Factories\MovieFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereGenreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereIsShowing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePublishedYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @property-read \App\Models\Genre|null $genre
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image_url', 'published_year', 'description', 'is_showing', 'genre_id'];

    public function genre(): HasOne
    {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
