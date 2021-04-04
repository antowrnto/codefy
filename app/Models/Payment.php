<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function student(){
      return $this->belongsTo(User::class);
    }
    
    public function course(){
      return $this->belongsTo(Course::class);
    }
}
