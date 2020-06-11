<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    // /**
    //  * @return Event[] Returns an array of Event objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    private function findVisibleEventQuery():QueryBuilder
    {
        return $this->createQueryBuilder('event')
          ->where('event.id != 0')
          ->orderBy('event.id','DESC');

    }


    /**
     * @return Query
     */
    public function findAllVisibleEventIndexQuery():Query
    {
        return $this->findVisibleEventQuery()
            ->getQuery();
    }

    /**
     * @return Event[]
     */
   public function findLatestEventQuery():array
    {
        return $this->findVisibleEventQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     */
    public function findLatestEventAdminQuery():array
    {
        return $this->findVisibleEventQuery()
            ->getQuery()
            ->getResult();
    }


    /**
     * @return Event[]
     */
    public function findLatestEventQueryForRoomPage():array
    {
        return $this->findVisibleEventQuery()
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */



}
