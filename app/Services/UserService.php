<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService implements UserServiceInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return $this->user->create($data);
    }

    public function update(User $user, array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return $user;
    }

    public function list(array $filters): LengthAwarePaginator
    {
        $query = $this->user->query()->filter($filters);
        return $query->paginate(10);
    }

    public function find(int $id): ?User
    {
        return $this->user->find($id);
    }

    public function delete(int $id): bool
    {
        $user = $this->user->find($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }
}
