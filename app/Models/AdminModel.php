<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class AdminModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'admins';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['email','name','password'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';


    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Validation
    protected $validationRules    = [
        'email'    => 'required|valid_email|is_unique[admins.email]',
        'name'     => 'required',
        'password' => 'required',
    ];

    protected $validationMessages = [
        'email'        => [
            'required' => 'please enter email address.',
            'is_unique' => 'this email address is already used, please choose another one.',
        ],
        'name'        => [
            'required' => 'please enter your name.'
        ],
        'password'        => [
            'required' => 'please provide password.'
        ],
    ];

    public function findUserByEmailAddress($emailAddress)
    {
        $user = $this
            ->asArray()
            ->where(['email' => $emailAddress])
            ->first();

        if (!$user)
            throw new Exception('User does not exist for specified email address');

        return $user;
    }

}
