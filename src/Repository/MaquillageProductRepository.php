<?php

namespace App\Repository;

use App\Entity\MaquillageProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaquillageProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaquillageProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaquillageProduct[]    findAll()
 * @method MaquillageProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaquillageProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaquillageProduct::class);
    }

    // /**
    //  * @return MaquillageProduct[] Returns an array of MaquillageProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaquillageProduct
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
