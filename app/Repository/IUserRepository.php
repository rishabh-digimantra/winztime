<?php
namespace App\Repository;

interface IUserRepository 
{
    public function getAllUsers();

    public function getUserById($id);


    public function createOrUpdateUser( $collection = [] );

    public function deleteUser($id);
}
?>