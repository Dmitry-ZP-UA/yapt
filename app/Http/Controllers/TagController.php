<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagController extends Controller
{
    const QUANTITY_TAGS_IN_LIST = 5;

    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * TagController constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param SearchRequest $request
     * @return array
     */
    public function search(SearchRequest $request)
    {
        $tags = $this->tagRepository->searchByWithLimit('tag',
            $request->q,
            self::QUANTITY_TAGS_IN_LIST);

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->tag, 'text' => $tag->tag];
        }

        return $formatted_tags;
    }
}