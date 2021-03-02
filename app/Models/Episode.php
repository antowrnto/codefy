<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    
    public function course()
    {
    		return $this->belongsTo(Course::class);
    }
    
    public function completed()
    {
        return $this->belongsTo(Completed::class);
    }
}