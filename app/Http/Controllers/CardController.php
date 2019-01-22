<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Models\Comments\Comment;
use App\Models\Users\User;
use App\Repositories\Interfaces\CardRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;


class CardController extends Controller
{
    /**
     * @var CardRepositoryInterface
     */
    private $cardRepository;

    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * CardController constructor.
     * @param CardRepositoryInterface $cardRepository
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(CardRepositoryInterface $cardRepository, TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->cardRepository = $cardRepository;
    }

    /**
     * @param CreateCardRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateCardRequest $request)
    {
        $this->cardRepository->create($request->only('title', 'description', 'assigned_to'));

        $this->tagRepository->createTags($request->only('tags'),
            $this->cardRepository->getLastId());

        return back();
    }

    public function delete()
    {

    }

    public function update()
    {

    }

    public function show(Comment $comment)
    {
        $cards = $this->cardRepository->getCardsWithTagsAndComments();

        return view('home', ['cards' => $cards]);
    }
}
