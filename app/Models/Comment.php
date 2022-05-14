<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    
    protected $fillable = [
        'text',
    ];

    protected static function booted()
    {
        static::creating(function ($comment) {
            $comment->user_id = Auth::id();
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
