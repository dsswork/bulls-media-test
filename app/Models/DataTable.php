<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string name
 * @property int user_id
 *
 * @property Collection|Column[] columns
 */
class DataTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function columns(): HasMany
    {
        return $this->hasMany(Column::class);
    }
}
