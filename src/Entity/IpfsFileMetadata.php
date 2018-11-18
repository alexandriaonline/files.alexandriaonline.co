<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IpfsFileMetadataRepository")
 */
class IpfsFileMetadata
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $file_size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_mimetype;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $file_ext;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\IpfsFile", inversedBy="ipfsFileMetadata")
     */
    private $ipfsFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    public function setFileSize(int $file_size): self
    {
        $this->file_size = $file_size;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(string $file_name): self
    {
        $this->file_name = $file_name;

        return $this;
    }

    public function getFileMimetype(): ?string
    {
        return $this->file_mimetype;
    }

    public function setFileMimetype(string $file_mimetype): self
    {
        $this->file_mimetype = $file_mimetype;

        return $this;
    }

    public function getFileExt(): ?string
    {
        return $this->file_ext;
    }

    public function setFileExt(string $file_ext): self
    {
        $this->file_ext = $file_ext;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpfsFile()
    {
        return $this->ipfsFile;
    }

    /**
     * @param mixed $ipfsFile
     */
    public function setIpfsFile($ipfsFile): void
    {
        $this->ipfsFile = $ipfsFile;
    }

}
