<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller {

    /**
     * @Route("/homepage", name="homepage")
     */
    public function indexAction(Request $request) {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/nos_services", name="services")
     */
    public function ServicesAction(Request $request) {
        $test = $request->query->get('tag');
        $model = $request->query->get('model');

        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'Annonce bien enregistrée');
        if ($test == 'bob') {
            throw new NotFoundHttpException('La page est inctrouvable');
        }
        return $this->render('services.html.twig', array(
                    'test' => $test,
                    'model' => $model
        ));
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function BlogAction(Request $request) {
        

        return $this->render('blog.html.twig');
    }
    
    /**
     * @Route("/guide_achat_neuf", name="new_vsp")
     */
    public function NewVspAction(Request $request) {
        return $this->render('new_vsp_ligier.html.twig');
    }

    /**
     * @Route("/guide_achat_neuf/{brand}", name="new_vsp_list")
     */
    public function NewVspListAction($brand) {
        return $this->render('new_vsp_'.$brand.'.html.twig', array( 'brand'=> $brand));
    }

    /**
     * @Route("/guide_achat_occasion", name="occaz_vsp")
     */
    public function OccazVspAction(Request $request) {
        return $this->render('occaz_vsp.html.twig');
    }

    /**
     * @Route("/financement", name="funding_vsp")
     */
    public function FundingVspAction(Request $request) {
        return $this->render('funding_vsp.html.twig');
    }

    /**
     * @Route("/nos_agences_partenaires", name="agencies_vsp")
     */
    public function AgenciesAction(Request $request) {
        return $this->render('agencies_vsp.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function ContactAction(Request $request) {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/a_propos", name="about_us")
     */
    public function AboutUsAction(Request $request) {
        return $this->render('about_us.html.twig');
    }

}
