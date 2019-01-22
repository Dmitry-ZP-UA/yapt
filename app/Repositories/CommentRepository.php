<?php

namespace App\Repositories;

use App\Models\Cards\Card;
use App\Models\Comments\Comment;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    /**
     * @var Card
     */
    private $card;

    /**
     * CommentRepository constructor.
     * @param Comment $comment
     * @param Card $card
     */
    public function __construct(Comment $comment, Card $card)
    {
        $this->card = $card;

        parent::__construct($comment);
    }

    /**
     * @param int $idCard
     * @param int $idComment
     */
    public function attachingCommentInCard(int $idCard, int $idComment)
    {
        $this->card->find($idCard)->comments()->attach($idComment);
    }

    /**
     * @param array $attributes
     */
    public function createComment(array $attributes)
    {
        $idComment = $this->model->insertGetId(
            [
                'comment' => $attributes['comment'],
                'user_id' => $attributes['user_id'],
                'created_at' => date("Y-m-d H:i:s"),
            ]
        );

        $this->attachingCommentInCard($attributes['card_id'], $idComment);
    }


}