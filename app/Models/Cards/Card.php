<?php

namespace App\Models\Cards;

use App\Models\Comments\Comment;
use App\Models\Roles\Role;
use App\Models\Statuses\Status;
use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * @var string
     */
    protected $table = 'cards';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'tag_card',
            'card_id',
            'tag_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments()
    {
        return $this->belongsToMany(
            Comment::class,
            'comment_card',
            'card_id',
            'comment_id'
        );
    }
}