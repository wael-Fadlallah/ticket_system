<?php

namespace App\Validation;

use App\Models\AdminModel;
use Exception;

class AdminRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new AdminModel();
            $user = $model->findUserByEmailAddress($data['email']);
            return password_verify($data['password'], $user['password']);
        } catch (Exception $e) {
            return false;
        }
    }
}
