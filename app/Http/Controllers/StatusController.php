<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Repositories\Interfaces\StatusRepositoryInterface;

class StatusController extends Controller
{
    const QUANTITY_STATUSES_IN_LIST = 10;

    /**
     * @var StatusRepositoryInterface
     */
    private $statusRepository;

    /**
     * StatusController constructor.
     * @param StatusRepositoryInterface $statusRepository
     */
    public function __construct(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * @param SearchRequest $request
     * @return array
     */
    public function search(SearchRequest $request)
    {
        $statuses = $this->statusRepository->searchByWithLimit('status',
            $request->q,
            self::QUANTITY_STATUSES_IN_LIST);

        $formatted_statuses = [];

        foreach ($statuses as $status) {
            $formatted_statuses[] = ['id' => $status->id, 'text' => $status->status];
        }

        return $formatted_statuses;
    }
}