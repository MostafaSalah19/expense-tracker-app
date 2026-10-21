<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
        'category',
        'type'
    ];

    // public function myUserRelation(){
    //     return $this -> belongsTo(User::class, 'user_id');
    // }

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
