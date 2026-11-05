<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'category',
        'date',
        'type',
    ];
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'date' => 'date',
        ];
    }

    // public function myUserRelation(){
    //     return $this -> belongsTo(User::class, 'user_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
