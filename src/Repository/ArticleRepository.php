<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
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
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    private function findVisibleArticleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('article')
            ->where('article.id != 0')
            ->orderBy('article.id','DESC');

    }


    /**
     * @return Article[]
     */
    public function findLatestArticleQuery():array
    {
        return $this->findVisibleArticleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }


    /**
     * @return Query
     */
    public function findAllVisibleArticleQuery():Query
    {
        return $this->findVisibleArticleQuery()
            ->getQuery();
    }

    /**
     * @return array
     */
    public function findLatestArticle():array
    {
        return $this->findVisibleArticleQuery()
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

}
