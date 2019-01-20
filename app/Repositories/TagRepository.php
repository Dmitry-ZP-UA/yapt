<?php

namespace App\Repositories;

use App\Models\Cards\Card;
use App\Models\Tags\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @var Card
     */
    private $card;

    /**
     * TagRepository constructor.
     * @param Tag $tag
     * @param Card $card
     */
    public function __construct(Tag $tag, Card $card)
    {
        $this->card = $card;

        parent::__construct($tag);
    }

    /**
     * @param array $idTags
     * @param int $idCard
     */
    public function attachingTagsInCard(array $idTags, int $idCard)
    {
        $this->card->find($idCard)->tags()->attach($idTags);
    }

    /**
     * @param array $attributes
     * @param int $idCard
     */
    public function createTags(array $attributes, int $idNote)
    {
        $idTags = array();

        $tagAttributes = $attributes['tags'];

        $tags = $this->model->get()->toArray();

        foreach ($tags as $tag) {
            foreach ($attributes['tags'] as $attribute) {
                if ($attribute == $tag['tag']) {
                    array_push($idTags, $tag['id']);
                    unset($tagAttributes[array_search($attribute, $tagAttributes)]);
                }
            }
        }

        foreach ($tagAttributes as $value) {
            $id = $this->model->insertGetId(
                ['tag' => $value]
            );
            array_push($idTags, $id);
        }

        $this->attachingTagsInCard($idTags, $idNote);


    }
}