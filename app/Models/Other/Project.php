<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, $id)
 * @method static create(array $except)
 */
class Project extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $table = '__projects';
    protected $guarded = ['id'];
}
