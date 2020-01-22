<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Repository\EntityManager;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    //public EntityManager em;

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function findByApprouve($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.approuve = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //findByOeuvresApprouve
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function findByOeuvresApprouve($value)
    {
        
        return $this->createQueryBuilder('p')
            ->andWhere('p.approuve = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //approveProduit
    public function approveProduit($produitId)
    {
        $updateEtat = $this->createQueryBuilder('p')
            ->update(Produit::class, 'p')
            ->set('p.approuve', 'true')
            ->where('p.id IN (?1)')
            ->setParameter(1, $produitId)
            //->setParameter(2, '2')
            ->getQuery();
            $updateEtat->execute();
        ;
    }

    /*
    public function findOneBySomeField($value): ?Produit
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
