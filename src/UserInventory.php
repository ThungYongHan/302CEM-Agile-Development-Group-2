<?php

namespace App;

class UserInventory
{
    private array $users;


    public function __construct(private UserRepoAnnie $usersRepo)
    {
    }

    public function setUsers()
    {
        $this->users = $this->usersRepo->fetchUsers();
    }

    public function getUsers():array
    {
        return $this->users;
    }
}