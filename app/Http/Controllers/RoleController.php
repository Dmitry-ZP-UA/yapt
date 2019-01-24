<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleController extends Controller
{
    const QUANTITY_ROLES_IN_LIST = 10;

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * RoleController constructor.
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param SearchRequest $request
     * @return array
     */
    public function search(SearchRequest $request)
    {
        $roles = $this->roleRepository->searchByWithLimit('role',
            $request->q,
            self::QUANTITY_ROLES_IN_LIST);

        $formatted_roles = [];

        foreach ($roles as $role) {
            $formatted_roles[] = ['id' => $role->id, 'text' => $role->role];
        }

        return $formatted_roles;
    }
}