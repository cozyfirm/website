<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $imageID)
 * @method static create(array $array)
 */
class File extends Model{
    use HasFactory;

    protected $table = '__files';
    protected $guarded = ['id'];

    public function getFile(): string {
        return (isset($this->path) and isset($this->name)) ? "/{$this->path}/{$this->name}" : "";
    }
}
