<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

//    public function users() // mains
//    {
//        return $this->belongsToMany(User::class, 'group_users', 'group_id', 'user_id')
////            ->withPivot('description', 'balance')
//            ->withPivot('id');
////            ->withTimestamps();
//    }
}
