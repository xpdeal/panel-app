<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int|null $user_id
 * @property int $active
 * @property string $log
 * @property string|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $status
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderWithdraw whereUserId($value)
 *
 * @mixin \Eloquent
 */
class OrderWithdraw extends Model
{
    use HasFactory;
}
