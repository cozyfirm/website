<?php

namespace App\Models\Other\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class APICalls extends Model{
    use HasFactory;

    protected $table = 'api_system_calls';
    protected $guarded = ['id'];
}
