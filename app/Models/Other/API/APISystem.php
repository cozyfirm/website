<?php

namespace App\Models\Other\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class APISystem extends Model{
    use HasFactory;

    protected $table = 'api_system';
    protected $guarded = ['id'];
}
