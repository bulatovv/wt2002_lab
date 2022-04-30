<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;



class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image'
    ];

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->user_id = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = preg_replace('/\s+/', ' ', trim($value));
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $value;
    }
}
