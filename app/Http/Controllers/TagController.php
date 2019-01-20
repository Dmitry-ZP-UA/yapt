<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;


class TagController
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
     * @param Request $request
     * @return array
     */
    public function search(Request $request)
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