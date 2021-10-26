<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
//use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
//use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
//use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
//use Symfony\Component\Security\Core\Users\UserInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository implements UsersRepositoryInterface 
{
    private $manager;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    { 
        $this->manager = $manager;
        parent::__construct($registry, Users::class);
    }



    public function getAllUsers():array
    {
//        
      return parent::findAll();  
    }
    

    public function getAuthors(int $id):array
    {
        return parent::findAll();
    }
    

    public function getOneUser(int $userId):object
    {
        return parent:: find($userId);
    }
    

    public function setCreateUser(Users $user): object
    { 
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
    

    public function setSave(User $user)
    {
        $this->entityManager->flush();
    }
    
    
        /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
//    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
//    {
//        if (!$user instanceof Users) {
//            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
//        }
//
//        $user->setPassword($newHashedPassword);
//        $this->_em->persist($user);
//        $this->_em->flush();
//   }


//    public function setDeleteUser(Article $user);
    
}

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
