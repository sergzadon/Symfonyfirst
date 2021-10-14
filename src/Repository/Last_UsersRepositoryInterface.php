<?php

namespace App\Repository;

use App\Entity\Users;

interface UsersRepositoryInterfa 
{
    /*
     * @return Users[]
     */
    public function getAllUsers():array;
    
    /*
     * вывод авторов статьи
     */
     /*
     * @return Users[]
     */
    public function getAuthors(int $id):array;
    
    /*
     * @return Article
     */
    public function getOneUser(int $id): object; 
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setCreateUser(User $user): object;
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setUpdateUser(User $user): object;
    
     /*
     * @param Article $article 
     * @return mixed
     */
    public function setDeleteUser(Article $user);
    
}




