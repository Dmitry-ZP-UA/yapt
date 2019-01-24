<?php

namespace App\Models\Roles;

use App\Models\Cards\Card;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
        'role'
    ];

    /**
     */
    public function card()
    {
        return $this->hasMany(Card::class);
    }
}