<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string name
 * @property string file
 * @property int user_id
 */
class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tables(): HasMany
    {
        return $this->hasMany(Table::class);
    }
}
