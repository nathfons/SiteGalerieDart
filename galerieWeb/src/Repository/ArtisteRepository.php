<?php

namespace App\Repository;

use App\Entity\Artiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use function Symfony\Component\String\u;

/**
 * @method Artiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artiste[]    findAll()
 * @method Artiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artiste::class);
    }

     /**
      * @return Artiste[] Returns an array of Artiste objects
      */
    
    public function findByCategorieArtiste($categorie,$lettre)
    {
        if(u($lettre)->equalsTo('*')){
            return $this->createQueryBuilder('artiste')
            ->join('artiste.categories','categorie')
            ->andWhere('categorie.nom = :categorie')
            ->setParameter('categorie', $categorie)
            ->orderBy('artiste.dateCreationCompte', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        }
        return $this->createQueryBuilder('artiste')
        ->join('artiste.categories','categorie')
        ->andWhere('categorie.nom = :categorie')
        ->setParameter('categorie', $categorie)
        ->andWhere('SUBSTRING(artiste.nom,1,1) = :lettre')
        ->setParameter('lettre', $lettre)
        ->orderBy('artiste.dateCreationCompte', 'DESC')
        ->getQuery()
        ->getResult()
    ;
      
    }

     /**
      * @return Artiste[] Returns an array of Artiste objects
      */
    
    public function findByFirstLetter($lettre)
    {
        if(u($lettre)->equalsTo('*')){
            return $this->createQueryBuilder('artiste')
            ->orderBy('artiste.dateCreationCompte', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        }
        return $this->createQueryBuilder('artiste')
        ->andWhere('SUBSTRING(artiste.nom,1,1) = :lettre')
        ->setParameter('lettre', $lettre)
        ->orderBy('artiste.dateCreationCompte', 'DESC')
        ->getQuery()
        ->getResult()
    ;
      
    }

     /**
      * @return Artiste[] Returns an array of Artiste objects
      */
    
    public function findByArtistesAlaune()
    {
        return $this->createQueryBuilder('artiste')
            ->andWhere('artiste.alaune = :val')
            ->setParameter('val', TRUE)
            ->orderBy('artiste.dateCreationCompte', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }
    
// /**
    //  * @return Artiste[] Returns an array of Artiste objects
    //  */
    
    public function findNouveauxArtistes($lettre)
    {
        if(u($lettre)->equalsTo('*')){
            return $this->createQueryBuilder('artiste')
            ->orderBy('artiste.dateCreationCompte', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
        }
        return $this->createQueryBuilder('artiste')
        ->andWhere('SUBSTRING(artiste.nom,1,1) = :lettre')
        ->setParameter('lettre', $lettre)
        ->orderBy('artiste.dateCreationCompte', 'DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
        ;
    }

    /**
      * @return Artiste[] Returns an array of Artiste objects
      */
    
      public function findArtistesPublies()
      {
          return $this->createQueryBuilder('artiste')
              ->andWhere('artiste.approuve = :val')
              ->setParameter('val', TRUE)
              ->orderBy('artiste.dateCreationCompte', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }

      /**
      * @return Artiste[] Returns an array of Artiste objects
      */
    
      public function findArtistesNouveaux()
      {
          return $this->createQueryBuilder('artiste')
              ->andWhere('artiste.approuve = :val')
              ->setParameter('val', FALSE)
              ->orderBy('artiste.dateCreationCompte', 'DESC')
              //->setMaxResults(3)
              ->getQuery()
              ->getResult()
          ;
      }

    //approveArtiste
    public function approveArtiste($artisteId)
    {
    $updateEtat = $this->createQueryBuilder('p')
        ->update(Artiste::class, 'p')
        ->set('p.approuve', 'true')
        ->where('p.id IN (?1)')
        ->setParameter(1, $artisteId)
        //->setParameter(2, '2')
        ->getQuery();
        $updateEtat->execute();
    ;
}

    //findCntNewArtistes
    public function findCntNewArtistes()
      {
          return $this->createQueryBuilder('artiste')
          ->select('COUNT(artiste.id)')
              ->andWhere('artiste.approuve = :val')
              ->setParameter('val', FALSE)
              
              //->setMaxResults(3)
              ->getQuery()
              ->getSingleScalarResult()
              //->getResult()
          ;
      }

    //nombre Artistes
    public function cntArtistes()
    {
        return $this->createQueryBuilder('artiste')
        ->select('COUNT(artiste.id)')  
            ->getQuery()
            ->getSingleScalarResult()
            //->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Artiste
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        
    }
    */
}
