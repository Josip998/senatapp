<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tocka extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Tocka::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Tocka::class, 'parent_id');
    }

    public function Materijali()
    {
        return $this->hasMany(Materijal::class);
    }

    public function Sjednica()
    {
        return $this->belongsTo(Sjednica::class);
    }
}

