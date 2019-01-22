<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CardRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @return int
     */
    public function getLastId(): int;

    /**
     * @return Collection
     */
    public function getCardsWithTagsAndComments(): Collection;
}