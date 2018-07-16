<?php

namespace App\Repository;

use App\Entity\ShippingAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShippingAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingAddress[]    findAll()
 * @method ShippingAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShippingAddressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShippingAddress::class);
    }

//    /**
//     * @return ShippingAddress[] Returns an array of ShippingAddress objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShippingAddress
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
