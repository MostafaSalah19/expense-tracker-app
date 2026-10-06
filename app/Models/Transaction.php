<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'user_id',
        'category',
        'description'
    ];

    // public function myUserRelation(){
    //     return $this -> belongsTo(User::class, 'user_id');
    // }

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
