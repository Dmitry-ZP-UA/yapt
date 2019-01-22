<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentController
{
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param $comment
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    public function create(CreateCommentRequest $request)
    {
        $this->commentRepository->createComment($request->only('comment', 'user_id', 'card_id'));

        return back();
    }

    public function delete()
    {

    }

    public function update()
    {

    }

}