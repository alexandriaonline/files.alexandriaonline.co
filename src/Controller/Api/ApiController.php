<?php

namespace App\Controller\Api;

use App\Entity\IpfsFile;
use App\Entity\IpfsFileMetadata;
use App\Entity\User;
use App\Form\FileUploadForm;
use App\Form\Type\FileUploadType;
use Cloutier\PhpIpfsApi\IPFS;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * @Security("has_role('ROLE_USER')")
     * @param Request $request
     * @param IPFS $ipfs
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function uploadAction(Request $request, IPFS $ipfs, EntityManagerInterface $em)
    {
        $fileUpload = new FileUploadForm();
        $form = $this->createForm(FileUploadType::class, $fileUpload);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $fileUpload->getFile();
            /** @var User $user */
            $user = $this->getUser();
            $hash = $ipfs->add(file_get_contents($file->getRealPath()));

            $ipfsMeta = new IpfsFileMetadata();
            $ipfsMeta
                ->setFileExt($file->guessExtension())
                ->setFileMimetype($file->getMimeType())
                ->setFileSize($file->getSize())
                ->setFileName($file->getClientOriginalName())
            ;

            $em->persist($ipfsMeta);

            $ipfsFile = new IpfsFile();
            $ipfsFile
                ->setSourceUser($user)
                ->setHash($hash)
                ->setIpfsFileMetadata($ipfsMeta)
            ;

            $em->persist($ipfsFile);

            $user->addFile($ipfsFile);

            $em->flush();
        }

        return new RedirectResponse($this->generateUrl('portal'));
    }
}