<?php

namespace App\Repository;

use App\Entity\Typelivraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typelivraison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typelivraison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typelivraison[]    findAll()
 * @method Typelivraison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypelivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typelivraison::class);
    }

    // /**
    //  * @return Typelivraison[] Returns an array of Typelivraison objects
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
    public function findOneBySomeField($value): ?Typelivraison
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
