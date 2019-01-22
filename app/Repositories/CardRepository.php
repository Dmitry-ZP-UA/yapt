<?php

namespace App\Repositories;

use App\Models\Cards\Card;
use App\Repositories\Interfaces\CardRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{

    /**
     * CardRepository constructor.
     * @param Card $card
     */
    public function __construct(Card $card)
    {
        parent::__construct($card);
    }

    /**
     * @return int
     */
    public function getLastId(): int
    {
        return $this->model->max('id');
    }

    /**
     * @return Collection
     */
    public function getCardsWithTagsAndComments(): Collection
    {
        return $this->model->with('tags', 'comments')->get();
    }

}