<?php

namespace App\Repository;

use App\Entity\ProductOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductOffer>
 *
 * @method ProductOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductOffer[]    findAll()
 * @method ProductOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductOffer::class);
    }

//    /**
//     * @return ProductOffer[] Returns an array of ProductOffer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProductOffer
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
