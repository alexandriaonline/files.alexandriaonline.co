<?php

namespace App\Repository;

use App\Entity\IpfsFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IpfsFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpfsFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpfsFile[]    findAll()
 * @method IpfsFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpfsFileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IpfsFile::class);
    }

    // /**
    //  * @return IpfsFile[] Returns an array of IpfsFile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IpfsFile
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
