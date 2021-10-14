<?php

namespace App\Repository;

use App\Entity\Users;

interface UsersRepositoryInterface 
{
   /**
    * 
    * @return array
    */
    public function getAllUsers():array;
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getAuthors(int $id):array;
    
    /**
     * 
     * @param int $userId
     * @return object
     */
    public function getOneUser(int $userId): object; 
    
    /**
     * 
     * @param Users $user
     * @return object
     */
    public function setCreateUser(Users $user): object;
    
    /**
     * @param User $user
     * @return mixed
     */
    public function setSave(User $user);
    
}




