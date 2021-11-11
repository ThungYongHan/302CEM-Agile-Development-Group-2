<?php

namespace App;

class UserYongHan
{
    private array $users;
    private UserRepositoryYongHan $usersRepo;

    public function __construct(UserRepositoryYongHan $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function setUsers()
    {
        $this->users = $this->usersRepo->fetchUsers();
    }

    public function getUsers()
    {
        return $this->users;
    }
}
