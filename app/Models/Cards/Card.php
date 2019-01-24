<?php

namespace App\Models\Cards;

use App\Models\Comments\Comment;
use App\Models\Roles\Role;
use App\Models\Statuses\Status;
use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
      'title', 'description',
      'assigned_to'
    ];
    /**
     * @var string
     */
    protected $table = 'cards';

    /**
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
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