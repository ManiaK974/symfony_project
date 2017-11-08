<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vsp;
use AppBundle\Form\VspType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class VspController extends Controller {

    public function searchAction(Request $request) {
        $advert = new Vsp();
        $form = $this->createForm(VspType::class, $advert);
        if ($form->handleRequest($request)->isValid()) {

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('widget/search_widget.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function searchToolbarNewVspAction(Request $request) {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Vsp')
        ;

        $listAdverts = $repository->getNumberOfVsp(1)// Tri
        ;

        return $this->render('widget/search_new_vsp_toolbar.html.twig', array('vsp' => $listAdverts));
    }

    
    public function getListNewVspAction() {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Vsp')
        ;

        $listAdverts = $repository->getListOfNewVsp("Ligier");

        return $this->render('widget/listing_vsp.html.twig', array(
                    'vsps' => $listAdverts));
    }

    public function getListLastNewVspAction() {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Vsp')
        ;

        $listLastAdverts = $repository->getListOfLastVsp();

        return $this->render('widget/last_list_vsp.html.twig', array('list' => $listLastAdverts));
    }

    /**
     * @Route("/add_vsp", name="add_vsp")
     * @Method({ "GET", "POST" })
     */
    public function addAction(Request $request) {
        $advert = new Vsp();
        $form = $this->createForm(VspType::class, $advert);
        if ($form->handleRequest($request)->isValid()) {

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('widget/search_widget.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
