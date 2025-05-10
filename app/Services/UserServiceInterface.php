<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserServiceInterface
{
    public function create(array $data): User;
    public function update(User $user, array $data): User;
    public function list(array $filters): LengthAwarePaginator;
    public function find(int $id): ?User;
    public function delete(int $id): bool;
}