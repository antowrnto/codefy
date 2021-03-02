<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;
    
    protected $table = 'account_details';
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
