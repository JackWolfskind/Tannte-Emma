<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Mitarbeiter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mitarbeiter controller.
 *
 */
class MitarbeiterController extends Controller
{
    /**
     * Lists all mitarbeiter entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mitarbeiters = $em->getRepository('TEmmaBundle:Mitarbeiter')->findAll();

        return $this->render('mitarbeiter/index.html.twig', array(
            'mitarbeiters' => $mitarbeiters,
        ));
    }

    /**
     * Creates a new mitarbeiter entity.
     *
     */
    public function newAction(Request $request)
    {
        $mitarbeiter = new Mitarbeiter();
        $form = $this->createForm('TEmmaBundle\Form\MitarbeiterType', $mitarbeiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mitarbeiter);
            $em->flush();

            return $this->redirectToRoute('mitarbeiter_show', array('mitarbeiternr' => $mitarbeiter->getMitarbeiternr()));
        }

        return $this->render('mitarbeiter/new.html.twig', array(
            'mitarbeiter' => $mitarbeiter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mitarbeiter entity.
     *
     */
    public function showAction(Mitarbeiter $mitarbeiter)
    {
        $deleteForm = $this->createDeleteForm($mitarbeiter);

        return $this->render('mitarbeiter/show.html.twig', array(
            'mitarbeiter' => $mitarbeiter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mitarbeiter entity.
     *
     */
    public function editAction(Request $request, Mitarbeiter $mitarbeiter)
    {
        $deleteForm = $this->createDeleteForm($mitarbeiter);
        $editForm = $this->createForm('TEmmaBundle\Form\MitarbeiterType', $mitarbeiter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mitarbeiter_edit', array('mitarbeiternr' => $mitarbeiter->getMitarbeiternr()));
        }

        return $this->render('mitarbeiter/edit.html.twig', array(
            'mitarbeiter' => $mitarbeiter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mitarbeiter entity.
     *
     */
    public function deleteAction(Request $request, Mitarbeiter $mitarbeiter)
    {
        $form = $this->createDeleteForm($mitarbeiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mitarbeiter);
            $em->flush();
        }

        return $this->redirectToRoute('mitarbeiter_index');
    }

    /**
     * Creates a form to delete a mitarbeiter entity.
     *
     * @param Mitarbeiter $mitarbeiter The mitarbeiter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mitarbeiter $mitarbeiter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mitarbeiter_delete', array('mitarbeiternr' => $mitarbeiter->getMitarbeiternr())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
