<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Point::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Point::class, 'parent_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}

