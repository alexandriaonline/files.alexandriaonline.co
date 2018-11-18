<?php

namespace App\Controller;

use App\Form\FileUploadForm;
use App\Form\Type\FileUploadType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function defaultAction()
    {
        return new RedirectResponse($this->generateUrl('app_login'));
    }

    /**
     * @Route("/portal", name="portal")
     * @Security("has_role('ROLE_USER')")
     */
    public function portal()
    {
        $fileUpload = new FileUploadForm();
        $form = $this->createForm(FileUploadType::class, $fileUpload);

        return $this->render('main/portal.html.twig', [
            'controller_name' => 'MainController',
            'UploadFileForm' => $form->createView()
        ]);
    }

//https://cloudflare-ipfs.com/ipfs/QmXA2rYCdnQHotYs7UKHkxbTdq5E7ZeZYzEUaCq5HfiYjS

    /**
     * @Route("/api_upload_action", name="upload")
     * @Security("has_role('ROLE_USER')")
     */
    public function upload()
    {
        /** @var User $user */
        $user = $this->getUser();

        $ipfsFiles = $user->getFiles();

        print $ipfsFiles;
    }

}
