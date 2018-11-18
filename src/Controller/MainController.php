<?php

namespace App\Controller;

use App\Entity\User;
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
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('main/portal.html.twig', [
            'controller_name' => 'MainController',
            'UploadFileForm' => $form->createView(),
            'files' => $user->getFiles()
        ]);
    }
}
