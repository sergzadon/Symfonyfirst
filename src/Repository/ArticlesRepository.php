<?php

namespace App\Repository;

use App\Entity\Articles;
//use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
//use App\Entity\Articles;


/**
 * @method Articles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articles[]    findAll()
 * @method Articles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesRepository extends ServiceEntityRepository implements ArticlesRepositoryInterface
{
    private $manager;
    
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    { 
        $this->manager = $manager;
        parent::__construct($registry, Articles::class);
    }
    
    
    /*
     * @return Article[]
     */
    public function getAllArticle():array
    {
//         return parent:: findAll();
        
          return $this->getEntityManager()
                ->createQueryBuilder()
            ->select('ar', "cat.name as cat_name","ar.id as ar_id","ar.title","ar.publicationdate",
                    "subcat.titlesubcat as subcat_name",
                    "ar.active", "user.id as user_id")
            ->from(Articles::class, 'ar')
            ->innerJoin(
                \App\Entity\Categories::class,
            'cat',
            \Doctrine\ORM\Query\Expr\Join::WITH,
               'cat.id = ar.category'
            )
                ->innerJoin(
                \App\Entity\Subcategories::class,
            'subcat',
            \Doctrine\ORM\Query\Expr\Join::WITH,
              'subcat.id = ar.subcategoryid'
            )
                ->innerJoin(
                \App\Entity\Users::class,
            'user',
            \Doctrine\ORM\Query\Expr\Join::WITH,

            )
//                  ->where('ar.id = user.articles' )
//                ->where('ar.active ='. 1 )
//                ->orderBy('ar.publicationdate', 'ASC')
//                ->setMaxResults(5)
                
                    ->getQuery()
                    ->getResult();
     
// ->leftJoin('f.productgroup', 'productgroup')        
//          SELECT * FROM  articles_users LEFT JOIN users 
//    ON users_id = users.id 
//    WHERE articles_users.articles_id = 2
         
    }
    
    public function getFiveArticleActive():array
    {
//        return $this->createQueryBuilder('ar')
//            ->where('ar.active = 1')
//            ->orderBy('ar.publicationdate', 'ASC')
//            ->setMaxResults(5)
//            ->getQuery()
//            ->execute();
        
//         return parent:: findBy(["active" => 1], ["publicationdate" => "ASC"], 5);
//        return $this->createQueryBuilder("ar")
//            ->select("ar.title", "c.name" )
////            ->join("ar.category", "c")
//            ->innerJoin("ar.category", "c")
////            ->orderBy('ar.publicationDate = ASC');
//            ->getQuery()
//            ->getResult();
        
        return $this->getEntityManager()
                ->createQueryBuilder()
            ->select('ar', "cat.name","ar.id as ar_id","ar.title","ar.summary",
                    "cat.id as cat_id","subcat.titlesubcat","subcat.id as subcat_id",
                    "ar.publicationdate")
            ->from(Articles::class, 'ar')
            ->innerJoin(
                \App\Entity\Categories::class,
            'cat',
            \Doctrine\ORM\Query\Expr\Join::WITH,
            'cat.id = ar.category')
                ->innerJoin(
                \App\Entity\Subcategories::class,
            'subcat',
            \Doctrine\ORM\Query\Expr\Join::WITH,
            'subcat.id = ar.subcategoryid')
                ->where('ar.active ='. 1 )
                ->orderBy('ar.publicationdate', 'ASC')
                ->setMaxResults(5)
                
                    ->getQuery()
                    ->getResult();
//        
//
//        return $query->execute();
//        return $this->getEntityManager()
//        ->createQueryBuilder()
//        ->select('p')
//        ->from(Articles::class, 'p')
//        ->innerJoin(\App\Entity\Categories::class, 'cat', 'with', 'cat.id = p.category')
////        ->innerJoin(\App\Entity\Subcategories::class, 'sub', 'with', 'sub.outerId = cat.id')
//    //    ->where('cp.category = '.$category->getId())
////        ->orderBy('p.id', 'ASC')
//        ->getQuery()
//        ->getResult();
    }
        
     /*
     * @return Article[]
     */
    public function getArticlesCategoryId(int $articleCatId):array
    {
        return parent:: findBy(["category" => $articleCatId] );
    }
    
    /*
     * @return Article
     */
    public function getOneArticle(int $articleId): object
    { 
        return parent:: find($articleId);
    } 
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setCreateArticle(Article $article): object
    {
        return parent:: find($article);
    }
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setUpdateArticle(Article $article): object
    {
        return parent:: find($article);
    }
    
     /*
     * @param Article $article 
     * @return mixed
     */
    public function setDeleteArticle(Article $article)
    {
        return parent:: find($article);
        
    }

    
}

    // /**
    //  * @return Articles[] Returns an array of Articles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Articles
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

