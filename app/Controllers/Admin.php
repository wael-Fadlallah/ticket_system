<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
class Admin extends ResourceController
{
    public function index()
    {
        return $this->respond("secure connection");
    }
}
