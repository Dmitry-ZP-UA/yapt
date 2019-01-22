<?php

namespace App\Models\Users;

use App\Models\Comments\Comment;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}