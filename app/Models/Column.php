<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string name
 * @property int data_table_id
 *
 * @property Collection values
 */
class Column extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'data_table_id',
    ];

    public function values(): HasMany
    {
        return $this->hasMany(Value::class);
    }
}
