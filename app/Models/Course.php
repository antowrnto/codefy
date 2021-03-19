<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Course extends Model
{
    use HasFactory;
    //use Searchable;
    
    public function mentor()
    {
    		return $this->belongsTo(User::class, 'mentor_id');
    }
    
    public function series()
    {
    		return $this->belongsTo(Series::class);
    }
    
    public function episodes()
    {
    		return $this->hasMany(Episode::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(User::class,
        'course_joined_student',
        'course_id',
        'student_id')
        ->withTimestamps();
    }
    
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    
    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        $array = $this->transform($array);
    
        $array['series_id'] = $this->series->title;
        $array['mentor_id'] = $this->mentor->name;
        
        return $array;
    }
}
