<?php

namespace App\Repository;

use App\Entity\BandeauPromo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BandeauPromo>
 *
 * @method BandeauPromo|null find($id, $lockMode = null, $lockVersion = null)
 * @method BandeauPromo|null findOneBy(array $criteria, array $orderBy = null)
 * @method BandeauPromo[]    findAll()
 * @method BandeauPromo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BandeauPromoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BandeauPromo::class);
    }

//    /**
//     * @return BandeauPromo[] Returns an array of BandeauPromo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BandeauPromo
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
