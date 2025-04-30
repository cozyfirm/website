<?php

namespace App\Models\Other\Visits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, string $date)
 */
class Visit extends Model{
    use HasFactory;

    protected $table = '__visits';
    protected $guarded = ['id'];
}
