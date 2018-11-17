<?php

namespace App\Repository;

use App\Entity\FileMetadata;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FileMetadata|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileMetadata|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileMetadata[]    findAll()
 * @method FileMetadata[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileMetadataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FileMetadata::class);
    }

    // /**
    //  * @return FileMetadata[] Returns an array of FileMetadata objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FileMetadata
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
