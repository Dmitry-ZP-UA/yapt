<?php

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param int $idCard
     * @param int $idComment
     * @return mixed
     */
    public function attachingCommentInCard(int $idCard, int $idComment);

    /**
     * @param array $attribute
     * @return mixed
     */
    public function createComment(array $attribute);
}