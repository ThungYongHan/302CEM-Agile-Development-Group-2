<?php

namespace App;

class User{
    private array $users;
    private UserRepository $usersRepo;

    public function __construct(UserRepository $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function setUsers(){
        $this->users = $this->usersRepo->fetchUsers();
    }

    public function getUsers(){
        return $this->users;
    }
}