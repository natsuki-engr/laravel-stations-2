<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string $date
 * @property int $schedule_id
 * @property int $sheet_id
 * @property string $email
 * @property string $name
 * @property int $is_canceled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereIsCanceled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereScheduleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereSheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'schedule_id', 'sheet_id', 'name', 'email', 'is_canceled'];

    public function sheet(): HasOne
    {
        return $this->hasOne(Sheet::class, 'id', 'sheet_id');
    }
}
