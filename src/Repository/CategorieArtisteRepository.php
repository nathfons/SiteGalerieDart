<?php

namespace App\Repository;

use App\Entity\CategorieArtiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategorieArtiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieArtiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieArtiste[]    findAll()
 * @method CategorieArtiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieArtisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieArtiste::class);
    }

    // /**
    //  * @return CategorieArtiste[] Returns an array of CategorieArtiste objects
    //  */
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
    public function findOneBySomeField($value): ?CategorieArtiste
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
