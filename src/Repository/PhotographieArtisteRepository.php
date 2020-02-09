<?php

namespace App\Repository;

use App\Entity\PhotographieArtiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhotographieArtiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotographieArtiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotographieArtiste[]    findAll()
 * @method PhotographieArtiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotographieArtisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotographieArtiste::class);
    }

    // /**
    //  * @return PhotographieArtiste[] Returns an array of PhotographieArtiste objects
    //  */
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
    public function findOneBySomeField($value): ?PhotographieArtiste
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
