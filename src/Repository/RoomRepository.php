<?php

namespace App\Repository;

use App\Entity\Room;
use App\Entity\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Room|null find($id, $lockMode = null, $lockVersion = null)
 * @method Room|null findOneBy(array $criteria, array $orderBy = null)
 * @method Room[]    findAll()
 * @method Room[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomRepository extends ServiceEntityRepository
{
    /**
     * @var PaginatorInterface
     */
    private $paginator;

    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Room::class);
        $this->paginator = $paginator;
    }

    /**
     * Récupère les produits en lien avec une recherche
     * @param SearchData $data
     * @return mixed
     */
    public function findSearch(SearchData $data)
    {
        return $this->getSearchQuery($data)->getQuery()->getResult();
    }

    /**
     * Récupère le prix minimum et maximum correspondant à une recherche
     * @param SearchData $data
     * @return integer[]
     */
    public function findMinMax(SearchData $data): array
    {
        $query = $this->createQueryBuilder('r');
        $results = $query
            ->select('MIN(r.weekPrice) as minWeekPrice', 'MAX(r.weekPrice) as maxWeekPrice', 'MIN(r.weekendPrice) as minWeekendPrice', 'MAX(r.weekendPrice) as maxWeekendPrice', 'MIN(r.guestPlaceCount) as minGuestPlaceCount', 'MAX(r.guestPlaceCount) as maxGuestPlaceCount')
            ->getQuery()
            ->getScalarResult();
        return [
            "minWeekPrice" => (int)$results[0]['minWeekPrice'],
            "maxWeekPrice" => (int)$results[0]['maxWeekPrice'],
            "minWeekendPrice" => (int)$results[0]['minWeekendPrice'],
            "maxWeekendPrice" => (int)$results[0]['maxWeekendPrice'],
            "minGuestPlaceCount" => (int)$results[0]['minGuestPlaceCount'],
            "maxGuestPlaceCount" => (int)$results[0]['maxGuestPlaceCount']
        ];
    }

    /**
     * @param SearchData $data
     * @return QueryBuilder
     */
    private function getSearchQuery(SearchData $data)
    {
        $query = $this
            ->createQueryBuilder('r')
            ->select('e', 'r')
            ->join('r.equipments', 'e');

        if (!empty($data->q)) {
            $query = $query
                ->orWhere('r.title LIKE :q')
                ->setParameter('q', '%'.$data->q.'%');
        }

        if (!empty($data->guestPlaceCount)) {
            $query = $query
                ->orWhere('r.guestPlaceCount = :gpc')
                ->setParameter('gpc', $data->guestPlaceCount);
        }

        if (!empty($data->minWeekPrice)) {
            $query = $query
                ->orWhere('r.weekPrice >= :min')
                ->setParameter('min', $data->minWeekPrice);
        }

        if (!empty($data->maxWeekPrice)) {
            $query = $query
                ->orWhere('r.weekPrice <= :max')
                ->setParameter('max', $data->maxWeekPrice);
        }

        if (!empty($data->minWeekendPrice)) {
            $query = $query
                ->orWhere('r.weekendPrice >= :min')
                ->setParameter('min', $data->minWeekendPrice);
        }

        if (!empty($data->maxWeekendPrice)) {
            $query = $query
                ->orWhere('r.weekendPrice <= :max')
                ->setParameter('max', $data->maxWeekendPrice);
        }

        if (!empty($data->equipments)) {
            $query = $query
                ->orWhere('e.id IN (:e)')
                ->setParameter('e', $data->equipments);
        }

        return $query;
    }

//    public function search($equipments, $startedAt = null, $endedAt = null)
//    {
//        $query = $this->createQueryBuilder('r');
//        $query->join('r.equipments', 'equipment')
//            ->andWhere('equipment.id IN (:equipments)')
//            ->setParameter("equipments", $equipments);
//        return $query->getQuery()->getResult();
//    }
//
//
//    private function roomWithMinOrMaxPrice($isWeekPrice = true, $isMin = true)
//    {
//        $query = $this->createQueryBuilder('r');
//        if ($isWeekPrice)
//            if ($isMin)
//                $query->select('r', $query->expr()->min('r.weekPrice'));
//            else
//                $query->select('r', $query->expr()->max('r.weekPrice'));
//        else
//            if ($isMin)
//                $query->select('r', $query->expr()->min('r.weekendPrice'));
//            else
//                $query->select('r', $query->expr()->max('r.weekendPrice'));
//        return $query->getQuery()->getResult();
//    }
//
//    public function findRoomWithMinWeekPrice()
//    {
//        return $this->roomWithMinOrMaxPrice(true, true);
//    }
//
//    public function findRoomWithMaxWeekPrice()
//    {
//        return $this->roomWithMinOrMaxPrice(true, false);
//    }
//
//    public function findRoomWithMinWeekendPrice()
//    {
//        return $this->roomWithMinOrMaxPrice(false, true);
//    }
//
//    public function findRoomWithMaxWeekendPrice()
//    {
//        return $this->roomWithMinOrMaxPrice(false, false);
//    }

        // /**
        //  * @return Room[] Returns an array of Room objects
        //  */
        /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('r')
                ->andWhere('r.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('r.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

        /**
         * @return Room[]
         */
        public function findAllVisibleRoomQuery(): array
        {
            return $this->findVisibleRoomQuery()
                ->getQuery()
                ->getResult();
        }


        /**
         * @return Room[]
         */
        public function findLatestRoomQuery(): array
        {
            return $this->findVisibleRoomQuery()
                ->orderBy('room.id','DESC')
                ->setMaxResults(8)
                ->getQuery()
                ->getResult();
        }

        private function findVisibleRoomQuery(): QueryBuilder
        {
            return $this->createQueryBuilder('room')
                ->where('room.published = true')
                ->orderBy('room.id', 'DESC');
        }

    public function findLatestRoomQueryPublished(): array
    {
        return $this->findVisibleRoomQuery()
            ->orderBy('room.id','DESC')
//            ->setMaxResults(8)
            ->getQuery()
            ->getResult();
    }

    public function findLatestRoomSimilaryQueryPublished(): array
    {
        return $this->findVisibleRoomQuery()
            ->orderBy('room.id','DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
    }

        /*
        public function findOneBySomeField($value): ?Room
        {
            return $this->createQueryBuilder('r')
                ->andWhere('r.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
        */

}
