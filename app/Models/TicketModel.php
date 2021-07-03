<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tickets';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_email', 'subject', 'message','name','urlIdentifier' ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';




    protected $validationRules    = [
        'user_email'   => 'required|valid_email',
        'name'         => 'required',
        'subject'      => 'required',
        'message'      => 'required',
    ];

    protected $validationMessages = [
        'user_email'        => [
            'required' => 'please enter email address.',
            'valid_email' => 'please enter valid email address.',
        ],
        'subject'        => [
            'required' => 'please enter subject.'
        ],
        'message'        => [
            'required' => 'message is messing.'
        ],
        'name'        => [
            'required' => 'name is required.'
        ],
    ];

        // Validation
        protected $skipValidation       = false;
        protected $cleanValidationRules = true;

        // Callbacks
        protected $allowCallbacks       = true;
        protected $beforeInsert         = [];
        protected $afterInsert          = [];
        protected $beforeUpdate         = [];
        protected $afterUpdate          = [];
        protected $beforeFind           = [];
        protected $afterFind            = [];
        protected $beforeDelete         = [];
        protected $afterDelete          = [];


        // protected function makeId(array $data)
        // {
        //     $data['urlIdentifier'] = 12345;
        //     return $data;
        // }

        public function listTickets(){
            $tickets = $this->asArray()->findAll();
            return $tickets;
        }

        public function getTicketbyReference($reference){
            $ticket = $this->where('urlIdentifier',$reference)->first();
            return $ticket;
        }

}
