<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $table = '__projects';
    protected $guarded = ['id'];
}
