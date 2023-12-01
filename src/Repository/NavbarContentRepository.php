<?php

namespace App\Repository;

use App\Entity\NavbarContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NavbarContent>
 *
 * @method NavbarContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavbarContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavbarContent[]    findAll()
 * @method NavbarContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavbarContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavbarContent::class);
    }

//    /**
//     * @return NavbarContent[] Returns an array of NavbarContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NavbarContent
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
