<?php

namespace App\Repository;

use App\Entity\RequestLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RequestLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequestLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequestLog[]    findAll()
 * @method RequestLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequestLogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RequestLog::class);
    }

    /**
     * @return RequestLog[] Returns an array of RequestLog objects
     */
    public function findFromLastHour()
    {
        $date = new \DateTime();
        $date->modify('-1 hour');

        return $this
            ->createQueryBuilder('r')
            ->andWhere('r.createdAt > :date')
            ->setParameter(':date', $date)
            ->getQuery()
            ->execute();
    }

}
