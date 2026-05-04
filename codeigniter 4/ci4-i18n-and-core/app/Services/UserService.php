<?php

namespace App\Services;

class UserService
{
    public function isAdmin(array $user): bool
    {
        return isset($user['role']) && $user['role'] === 'admin';
    }

    public function canDeleteUser(array $currentUser, array $targetUser): bool
    {
        if ($currentUser['id'] === $targetUser['id']) {
            return false;
        }

        return $this->isAdmin($currentUser);
    }
}
