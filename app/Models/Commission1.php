<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission1 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function agent(){
        return $this->hasOne(User::class,'id','agent_id');
    }
    public function customer(){
        return $this->hasOne(User::class,'id','customer_id');
    }
}
