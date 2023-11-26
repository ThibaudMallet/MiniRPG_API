<?php

namespace App\Repository;

use App\Entity\Level;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Level>
 *
 * @method Level|null find($id, $lockMode = null, $lockVersion = null)
 * @method Level|null findOneBy(array $criteria, array $orderBy = null)
 * @method Level[]    findAll()
 * @method Level[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Level::class);
    }

   /**
    * @return Level Retourne le Level qui correspond au personnage selon son exp
    */
   public function findLevelByCharactersExperience($value): ?Level
   {
       return $this->createQueryBuilder('l')
           ->andWhere('l.base_experience <= :val')
           ->setParameter('val', $value)
           ->orderBy('l.base_experience', 'DESC')
           ->setMaxResults(1)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }

//    public function findOneBySomeField($value): ?Level
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
