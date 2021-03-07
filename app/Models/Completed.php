<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    use HasFactory;
    
    protected $table = 'episodes_completeds';
    
    public function episodes()
    {
        return $this->hasMany(Episodes::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
