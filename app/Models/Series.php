<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'url_icon', 'slug'];
    
    public function courses(){
    		return $this->hasMany(Course::class);
    }
}