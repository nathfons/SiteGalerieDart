<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Repository\EntityManager;
use App\Repository\Join;
use App\Constants\BDDconstants;
use function Symfony\Component\String\u;


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

    //les produits non approuvés
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function findByApprouve($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.approuve = :val')
            ->andWhere('p.produitoriginal is not null')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //les oeuvres non approuvés
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function findByOeuvresApprouve()
    {
        //commission, prixHT
        return $this->createQueryBuilder('p')
            ->select('p')
            ->andWhere('p.approuve = :val')
            ->andWhere('p.produitoriginal is null')
            ->setParameter('val', "false")
            ->orderBy('p.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function nbOeuvresApprouve()
      {
          return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->andWhere('p.approuve = :val')
            ->andWhere('p.produitoriginal is null')
            ->setParameter('val', "false")
            ->getQuery()
            ->getSingleScalarResult()
            
          ;
      }

      public function nbProduitsApprouve()
      {
          return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->andWhere('p.approuve = :val')
            ->andWhere('p.produitoriginal is not null')
            ->setParameter('val', "true")
            ->getQuery()
            ->getSingleScalarResult()
            
          ;
      }

    //-------------

    //stock des produits en vente
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function stockProduits_enVente()
    {
        return $this->createQueryBuilder('p')
            
            ->andWhere('p.produitoriginal is not null')
            ->andWhere('p.enVente = :val')
            ->setParameter('val', TRUE)
            ->orderBy('p.quantiteStocks', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //stock des produits suspendus ou épuisés
    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function stockProduits()
    {
        return $this->createQueryBuilder('p')
            
            ->andWhere('p.produitoriginal is not null')
            ->andWhere('p.enVente = :val')
            
            ->setParameter('val', FALSE)
            ->orderBy('p.quantiteStocks', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

        //stock des produits en vente
    // /**
    //  * @return Oeuvres[] Returns an array of Produit objects
    //  */
    
    public function stockOeuvres_enVente()
    {
        return $this->createQueryBuilder('p')
            
            ->andWhere('p.produitoriginal is null')
            ->andWhere('p.enVente = :val')
            ->setParameter('val', TRUE)
            ->orderBy('p.quantiteStocks', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //stock des produits suspendus ou épuisés
    // /**
    //  * @return Oeuvres[] Returns an array of Produit objects
    //  */
    
    public function stockOeuvres()
    {
        return $this->createQueryBuilder('p')
            
            ->andWhere('p.produitoriginal is null')
            ->andWhere('p.enVente = :val')
            
            ->setParameter('val', FALSE)
            ->orderBy('p.quantiteStocks', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    

    //-------------


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

    //commanderStock
    public function commanderStock($produitId, $produitStock, $qte)
    {
        $updateEtat = $this->createQueryBuilder('p')
            ->update(Produit::class, 'p')
            ->set('p.quantiteStocks', $produitStock+$qte)
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


     /**
      * @return Produit[] Returns an array of Produit objects
      */
    public function findByFirstLetter($lettre,$isOeuvre)
    {

        $typeProduit = BDDconstants::TYPEPRODUIT_ArticlesEnVente;
        if($isOeuvre == true){
            $typeProduit = BDDconstants::TYPEPRODUIT_Oeuvre;
        }
        if(u($lettre)->equalsTo('*')){
            return $this->createQueryBuilder('produit')
            ->andWhere('produit.typeProduit = :type')
            ->setParameter('type', $typeProduit)
            ->orderBy('produit.dateCreation', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        }
        return $this->createQueryBuilder('produit')
            ->andWhere('produit.typeProduit = :type')
            ->setParameter('type', $typeProduit)
        ->andWhere('SUBSTRING(produit.nomProduit,1,1) = :lettre')
        ->setParameter('lettre', $lettre)
        ->orderBy('produit.dateCreation', 'DESC')
        ->getQuery()
        ->getResult()
    ;
      
    }

     /**
      * @return Produit[] Returns an array of Artiste objects
      */
    
    public function findByCategorieProduit($categorie,$lettre,$isOeuvre)
    {

        $typeProduit = BDDconstants::TYPEPRODUIT_ArticlesEnVente;
        if($isOeuvre == true){
            $typeProduit = BDDconstants::TYPEPRODUIT_Oeuvre;
        }
        if(u($lettre)->equalsTo('*')){
            return $this->createQueryBuilder('produit')
            ->join('produit.categorie','categorie')
            ->andWhere('categorie.nomcategorie = :categorieProduit')
            ->setParameter('categorieProduit', $categorie)
            ->andWhere('produit.typeProduit = :type')
            ->setParameter('type', $typeProduit)
            ->orderBy('produit.dateCreation', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        }
        return $this->createQueryBuilder('produit')
        ->join('produit.categorie','categorie')
        ->andWhere('categorie.nomcategorie = :categorieProduit')
        ->setParameter('categorieProduit', $categorie)
            ->andWhere('produit.typeProduit = :type')
            ->setParameter('type', $typeProduit)
        ->andWhere('SUBSTRING(produit.nomProduit,1,1) = :lettre')
        ->setParameter('lettre', $lettre)
        ->orderBy('produit.dateCreation', 'DESC')
        ->getQuery()
        ->getResult()
    ;
    }

     /**
      * @return Produit[] Returns an array of Artiste objects
      */
    public function findMostSold()
    {
        $typeProduit = BDDconstants::TYPEPRODUIT_ArticlesEnVente;
        
            return $this->createQueryBuilder('produit')
            ->andWhere('produit.enVente = :enVente')
            ->andWhere('produit.typeProduit = :typeProduit')
            ->setParameter('typeProduit', $typeProduit)
            ->setParameter('enVente', TRUE)
            ->orderBy('produit.quantiteVendue', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }
}
