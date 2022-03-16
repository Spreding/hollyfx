<?php

namespace App\Repository;

use App\Entity\DeliverySystem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeliverySystem|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliverySystem|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliverySystem[]    findAll()
 * @method DeliverySystem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliverySystemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeliverySystem::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DeliverySystem $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(DeliverySystem $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DeliverySystem[] Returns an array of DeliverySystem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeliverySystem
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
