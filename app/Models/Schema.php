<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property array fields
 * @property int user_id
 */
class Schema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fields',
        'user_id',
    ];

    protected $casts = [
        'fields' => 'array'
    ];
}
