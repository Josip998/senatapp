<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function scopeCurrent($query)
    {
        return $query->where('end_time', '>=', Carbon::now());
    }

    public function scopePast($query)
    {
        return $query->where('end_time', '<', Carbon::now());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>=', Carbon::now());
    }
}


