<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class SinglePage extends Model{
    use HasFactory;

    protected $table = '__single_pages';
    protected $guarded = ['id'];
}
