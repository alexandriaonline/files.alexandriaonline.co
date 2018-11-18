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

    public function fileExists($hash)
    {
        if ($this->findOneBy(['hash' => $hash]))
        {
            return true;
        }

        return false;
    }
}
