<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Commande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commande[]    findAll()
 * @method Commande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    // /**
    //  * @return Commande[] Returns an array of Commande objects
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
    public function findOneBySomeField($value): ?Commande
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    //findAllCommandesEncours
     /**
      * @return Commandes[] Returns an array of Artiste objects
      */
    
      public function allCommandesEncours()
      {
          return $this->createQueryBuilder('commande')
              ->andWhere('commande.etatcommande = :val')
              ->setParameter('val', 'enCours')
              ->orderBy('commande.datecommande', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }

      /**
      * @return CommandesLivraison[] Returns an array of Artiste objects
      */
    
      public function allCommandesLivraison()
      {
          return $this->createQueryBuilder('commande')
              ->andWhere('commande.etatcommande = :val')
              ->setParameter('val', 'livraison')
              ->orderBy('commande.datecommande', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }

       /**
      * @return CommandesRetournees[] Returns an array of Artiste objects
      */
    
      public function allCommandesRetournees()
      {
          return $this->createQueryBuilder('commande')
              ->andWhere('commande.etatcommande = :val')
              ->setParameter('val', 'retournee')
              ->orderBy('commande.datecommande', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }

       /**
      * @return CommandesLivrees[] Returns an array of Artiste objects
      */
    
      public function allCommandesLivrees()
      {
          return $this->createQueryBuilder('commande')
              ->andWhere('commande.etatcommande = :val')
              ->setParameter('val', 'livré')
              ->orderBy('commande.datecommande', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }
    
    //findNbCommandesEncours
    public function nbCommandesEncours()
      {
          return $this->createQueryBuilder('commande')
          ->select('COUNT(commande.id)')
              ->andWhere('commande.etatcommande = :val')
              ->setParameter('val', 'enCours')
              ->orderBy('commande.datecommande', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getSingleScalarResult()
              //->getResult()
          ;
      }
      
}
