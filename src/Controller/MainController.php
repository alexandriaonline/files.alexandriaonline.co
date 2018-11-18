<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/portal", name="portal")
     * @Security(expression="has_role=ROLE_ADMIN")
     */
    public function portal()
    {
        return $this->render('main/portal.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
