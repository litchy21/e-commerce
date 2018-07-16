<?php

namespace App\Repository;

use App\Entity\InternationalShippings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InternationalShippings|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternationalShippings|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternationalShippings[]    findAll()
 * @method InternationalShippings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternationalShippingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InternationalShippings::class);
    }

//    /**
//     * @return InternationalShippings[] Returns an array of InternationalShippings objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternationalShippings
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
