<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    public function mentor(){
    		return $this->belongsTo(User::class, 'mentor_id');
    }
    
    public function series(){
    		return $this->belongsTo(Series::class);
    }
    
    public function episodes(){
    		return $this->hasMany(Episode::class);
    }
    
    public function students(){
        return $this->belongsToMany(User::class,
        'course_joined_student',
        'course_id',
        'student_id')
        ->withTimestamps();
    }
}