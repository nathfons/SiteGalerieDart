<?php

namespace App\Repository;

use App\Entity\TvaActuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TvaActuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvaActuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvaActuel[]    findAll()
 * @method TvaActuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvaActuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvaActuel::class);
    }

    // /**
    //  * @return TvaActuel[] Returns an array of TvaActuel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TvaActuel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
