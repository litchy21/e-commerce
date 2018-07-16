<?php

namespace App\Repository;

use App\Entity\ProductDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductDetails[]    findAll()
 * @method ProductDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductDetailsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductDetails::class);
    }

//    /**
//     * @return ProductDetails[] Returns an array of ProductDetails objects
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
    public function findOneBySomeField($value): ?ProductDetails
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
