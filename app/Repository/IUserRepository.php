<?php

namespace App\Repository;

interface IUserRepository
{
    public function registerUser(array $data);
    public function loginUser(array $data);
    public function getUsersList();
    public function getUser(array $data);
    public function updateUser(array $data);
    public function deleteUser(int $id);
}
