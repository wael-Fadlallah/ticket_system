<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class API extends ResourceController
{
    public function contact_us()
    {
        $ticketModel = new \App\Models\TicketModel();
        $data = $_POST;
        $data['urlIdentifier'] = time();

        if(!$ticketModel->insert($data))
            // return the validation error if insert failed
            return $this->respond($ticketModel->errors());

        $url = base_url()."/ticket/".$data['urlIdentifier'];
        $link = " <a href='$url'> click here to open ticket details </a> ";


        $email = \Config\Services::email();
        $email->setFrom($_POST['user_email'],$_POST['name']);
        $email->setTo('wael.fudlallah@gmail.com');
        $email->setSubject($_POST['subject']);
        $email->setMessage($link);

        if($email->send())
            $this->respond("sent",201);
        else
            $this->respond("undefined error,unable to send email");
    }

    public function register(){
        $adminModel = new \App\Models\AdminModel();

        $data = [
            'email'     => $this->request->getVar("email"),
            'name'      => $this->request->getVar("name"),
            'password'  => password_hash($this->request->getVar("password"),PASSWORD_BCRYPT),
        ];

        if(!$adminModel->insert($data))
            // return the validation error if insert failed
            return $this->respond($adminModel->errors());

        $admin = $adminModel->findUserByEmailAddress($data['email']);
        unset($admin['password']);
        return $this->respond($admin,201);
    }

    public function login(){
        $adminModel = new \App\Models\AdminModel();

        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        if (!$this->validateRequest($_POST, $rules, $errors)) {
            return $this
                ->respond(
                    $this->validator->getErrors(),
                    400
                );
        }
        return $this->getJWTForUser($_POST['email']);
    }

    public function list(){
        $ticketModel = new \App\Models\TicketModel();
        return $this->respond($ticketModel->listTickets());
    }

    public function show_ticket($reference){
        $ticketModel = new \App\Models\TicketModel();
        return $this->respond($ticketModel->getTicketbyReference($reference));
    }
    public function update_ticket(){
        $ticketModel = new \App\Models\TicketModel();
        $ticket = $_POST;
        $ticket['id'] = (int) $ticket['id'];
        $ticketModel->save($ticket);
        return $this->respond($ticket);
    }

    public function delete_ticket($id){
        $ticketModel = new \App\Models\TicketModel();
        return $ticketModel->delete($id);
    }

    private function getJWTForUser($emailAddress)
    {
        try {
            $model = new \App\Models\AdminModel();
            $admin = $model->findUserByEmailAddress($emailAddress);
            unset($admin['password']);
            helper('jwt');
            return $this
                ->respond(
                    [
                        'message' => 'User authenticated successfully',
                        'user' => $admin,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ]
                );
        } catch (Exception $exception) {
            return $this
                ->respond(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    401
                );
        }
    }
}
