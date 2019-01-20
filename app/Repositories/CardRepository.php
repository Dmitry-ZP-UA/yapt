<?php

namespace App\Repositories;

use App\Models\Cards\Card;
use App\Repositories\Interfaces\CardRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;

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
}