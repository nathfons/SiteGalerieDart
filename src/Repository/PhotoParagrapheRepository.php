<?php

namespace App\Repository;

use App\Entity\PhotoParagraphe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhotoParagraphe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoParagraphe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoParagraphe[]    findAll()
 * @method PhotoParagraphe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoParagrapheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoParagraphe::class);
    }

    // /**
    //  * @return PhotoParagraphe[] Returns an array of PhotoParagraphe objects
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
    public function findOneBySomeField($value): ?PhotoParagraphe
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
