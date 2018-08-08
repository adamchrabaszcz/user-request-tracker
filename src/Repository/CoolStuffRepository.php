<?php

namespace App\Repository;

use App\Entity\CoolStuff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoolStuff|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoolStuff|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoolStuff[]    findAll()
 * @method CoolStuff[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoolStuffRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoolStuff::class);
    }

//    /**
//     * @return CoolStuff[] Returns an array of CoolStuff objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoolStuff
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
