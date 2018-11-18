<?php

namespace App\Form;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class FileUploadForm
{
    /**
     * @var UploadedFile
     * @Assert\NotBlank(message="Upload a file of some kind. Blank Response")
     */
    private $file;

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     * @return FileUploadForm
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
}