<?php

namespace App\Repositories\Interfaces;

interface CardRepositoryInterface extends BaseRepositoryInterface
{
    public function getLastId(): int;
}