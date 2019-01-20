<?php

namespace App\Repositories;

use App\Models\Cards\Card;
use App\Repositories\Interfaces\CardRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{

    public function __construct(Card $card)
    {
        parent::__construct($card);
    }

    public function getLastId(): int
    {
        return $this->model->max('id');
    }

    public function getCardsWithTags(): Collection
    {
        return $this->model->with('tags')->get();
    }

}