<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission2 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
        return $this->hasOne(User::class,'id','new_user_id');
    }
}
