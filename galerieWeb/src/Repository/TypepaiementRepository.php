<?php

namespace App\Repository;

use App\Entity\Typepaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typepaiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typepaiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typepaiement[]    findAll()
 * @method Typepaiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypepaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typepaiement::class);
    }

    // /**
    //  * @return Typepaiement[] Returns an array of Typepaiement objects
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
    public function findOneBySomeField($value): ?Typepaiement
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
