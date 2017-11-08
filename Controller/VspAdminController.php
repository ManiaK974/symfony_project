<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vsp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * VspAdmin controller.
 *
 * @Route("admin_site/vsps")
 */
class VspAdminController extends Controller {

    /**
     * Dashboard of Vsp Admin.
     *
     * @Route("/", name="admin_site_vsps")
     * 
     */
    public function indexAction() {
        return $this->render('vspadmin/index.html.twig');
    }

}
