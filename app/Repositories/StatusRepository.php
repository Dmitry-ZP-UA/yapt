<?php

namespace App\Repositories;

use App\Models\Statuses\Status;
use App\Repositories\Interfaces\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
{
    /**
     * StatusRepository constructor.
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        parent::__construct($status);
    }
}