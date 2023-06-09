<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file_path', 'point_id'];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
