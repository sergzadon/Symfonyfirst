<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
//class LastUsersRepository extends ServiceEntityRepository implements UsersRepositoryInterface
//{
//    private $manager;
//    
//    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
//    { 
//        $this->manager = $manager;
//        parent::__construct($registry, Users::class);
//    }
//    
//    /*
//     * @return Users[]
//     */
//    public function getAllUsers():array
//    {
//        return parent:: findAll();
//    }
//    
//    /*
//     * вывод авторов статьи
//     */
//     /*
//     * @return Users[]
//     */
//    public function getAuthors(int $id):array
//    {
//        return parent:: findAll($id);
//    }
//    
//    /*
//     * @return Article
//     */
//    public function getOneUser(int $id): object
//    {
//        return parent:: findOneBy($id);
//    }
//    
//    /*
//     * @param Article $article 
//     * @return Article
//     */
//    public function setCreateUser(User $user): object
//    {
//        
//    }
//    
//    /*
//     * @param Article $article 
//     * @return Article
//     */
//    public function setUpdateUser(User $user): object
//    {
//        
//    }
//    
//     /*
//     * @param Article $article 
//     * @return mixed
//     */
//    public function setDeleteUser(Article $user)
//    {
//        
//    }

    // /**
    //  * @return Users[] Returns an array of Users objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
//}
