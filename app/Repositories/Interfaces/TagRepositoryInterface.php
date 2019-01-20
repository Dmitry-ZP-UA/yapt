<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param array $idTags
     * @param int $idCard
     * @return mixed
     */
    public function attachingTagsInCard(array $idTags, int $idCard);

    /**
     * @param array $attributes
     * @param int $idCard
     * @return mixed
     */
    public function createTags(array $attributes, int $idCard);
}