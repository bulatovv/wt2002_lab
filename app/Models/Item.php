<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image'
    ];

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
