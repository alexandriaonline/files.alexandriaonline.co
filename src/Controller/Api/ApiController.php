<?php

namespace App\Controller\Api;

use App\Form\FileUploadForm;
use App\Form\Type\FileUploadType;
use Cloutier\PhpIpfsApi\IPFS;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 * @package App\Controller\Api
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/upload", name="api_upload_action")
     * @param Request $request
     * @param IPFS $ipfs
     * @return Response
     */
    public function uploadAction(Request $request, IPFS $ipfs)
    {
        $fileUpload = new FileUploadForm();
        $form = $this->createForm(FileUploadType::class, $fileUpload);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $fileUpload->getFile();
            return new Response('Hello World!');
        }

        return new Response('noop');
    }
}