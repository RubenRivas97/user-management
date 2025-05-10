<?php

namespace App\Services;

use App\Models\User;

interface UserServiceInterface
{
    public function create(array $data): User;
    public function update(User $user, array $data): User;
}