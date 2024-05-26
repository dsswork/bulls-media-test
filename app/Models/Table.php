<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string name
 * @property string sheet
 * @property int connection_id
 *
 * @property Connection connection
 */
class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sheet',
        'connection_id',
    ];

    public function connection(): BelongsTo
    {
        return $this->belongsTo(Connection::class);
    }
}
