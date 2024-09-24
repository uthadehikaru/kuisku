<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
