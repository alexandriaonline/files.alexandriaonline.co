<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IpfsFileRepository")
 */
class IpfsFile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="files")
     */
    private $sourceUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\IpfsFileMetadata", mappedBy="ipfsFile")
     */
    private $ipfsFileMetadata;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSourceUser()
    {
        return $this->sourceUser;
    }

    /**
     * @param mixed $sourceUser
     * @return IpfsFile
     */
    public function setSourceUser($sourceUser): self
    {
        $this->sourceUser = $sourceUser;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpfsFileMetadata()
    {
        return $this->ipfsFileMetadata;
    }

    /**
     * @param mixed $ipfsFileMetadata
     * @return IpfsFile
     */
    public function setIpfsFileMetadata(IpfsFileMetadata $ipfsFileMetadata): self
    {
        $this->ipfsFileMetadata = $ipfsFileMetadata;

        return $this;
    }

}
