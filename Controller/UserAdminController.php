<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Useradmin controller.
 *
 * @Route("admin_site")
 */
class UserAdminController extends Controller {

    /**
     * Lists all userAdmin entities.
     *
     * @Route("/", name="admin_site_index")
     * 
     */
    public function indexAction(Request $request) {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:UserAdmin');
        
        $admin = $repository->isOneAdmin();
        
        if($admin == 0) {
            $this->addFlash('error', "Vous n'avez pas encore créé de compte administrateur. Bah alors ?!");
            return $this->redirectToRoute('admin_site_new');
        }
        
        return $this->redirectToRoute('admin_site_login');

    }

    /**
     * Connexion page for an Admin.
     *
     * @Route("/login", name="admin_site_login")
     * @Method({ "GET", "POST" })
     */
    public function loginAction(Request $request) {
        $userAdmin = new Useradmin();
        $form = $this->createForm('AppBundle\Form\UserAdminType', $userAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formAdmin = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $rep = $em->getRepository('AppBundle:UserAdmin');

            $user = $rep->findOneBy(array('mail' => $formAdmin->getMail(), 'password' => $formAdmin->getPassword()));
            if (!$user) {
                $this->addFlash("error", "Cet administrateur n'existe pas. Veuillez vérifier les données entrées.");
                return $this->render('useradmin/index.html.twig', array(
                            'form' => $form->createView()));
                ;
            }
            $this->get('session')->set('adminLogin', $user->getLogin());

            return $this->dashboardAction();
        }


        return $this->render('useradmin/index.html.twig', array(
                    'form' => $form->createView()));
    }

    /**
     * Dashboard page.
     *
     * @Route("/dashboard", name="admin_site_dashboard")
     * @Method({ "GET", "POST" })
     */
    public function dashboardAction() {
        $session = $this->get('session')->get('adminLogin');
        return $this->render('useradmin/admin_dashboard.html.twig', array('adminLogin' => $session));
    }

    /**
     * Creates a new userAdmin entity.
     *
     * @Route("/new_registration", name="admin_site_new")
     * @Method({"GET", "POST"})
     */
    public function registrationAction(Request $request) {
        $userAdmin = new Useradmin();
        $form = $this->createForm('AppBundle\Form\UserAdminRegistrationType', $userAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_site_login');
        }

        return $this->render('useradmin/new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userAdmin entity.
     *
     * @Route("/{id}", name="admin_site_show")
     * @Method("GET")
     */
    public function showAction(UserAdmin $userAdmin) {
        $deleteForm = $this->createDeleteForm($userAdmin);

        return $this->render('useradmin/show.html.twig', array(
                    'userAdmin' => $userAdmin,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userAdmin entity.
     *
     * @Route("/{id}/edit", name="admin_site_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserAdmin $userAdmin) {
        $deleteForm = $this->createDeleteForm($userAdmin);
        $editForm = $this->createForm('AppBundle\Form\UserAdminType', $userAdmin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_site_edit', array('id' => $userAdmin->getId()));
        }

        return $this->render('useradmin/edit.html.twig', array(
                    'userAdmin' => $userAdmin,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userAdmin entity.
     *
     * @Route("/{id}", name="admin_site_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserAdmin $userAdmin) {
        $form = $this->createDeleteForm($userAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userAdmin);
            $em->flush();
        }

        return $this->redirectToRoute('admin_site_index');
    }

    /**
     * Creates a form to delete a userAdmin entity.
     *
     * @param UserAdmin $userAdmin The userAdmin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserAdmin $userAdmin) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_site_delete', array('id' => $userAdmin->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
