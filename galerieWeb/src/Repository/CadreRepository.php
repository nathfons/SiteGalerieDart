<?php

namespace App\Repository;

use App\Entity\Cadre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cadre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cadre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cadre[]    findAll()
 * @method Cadre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CadreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cadre::class);
    }

     /**
      * @return Cadre[] Returns an array of Cadre objects
      */
    
    public function findByExampleField($value1, $value2)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.nomcadre = :val1')
            ->andWhere('c.imagecadre = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Cadre
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
