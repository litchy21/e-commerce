<?php

namespace App\Repository;

use App\Entity\ProductToOrders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductToOrders|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductToOrders|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductToOrders[]    findAll()
 * @method ProductToOrders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductToOrdersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductToOrders::class);
    }

//    /**
//     * @return ProductToOrders[] Returns an array of ProductToOrders objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductToOrders
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
