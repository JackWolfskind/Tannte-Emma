<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Kunde;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Kunde controller.
 *
 */
class KundeController extends Controller
{
    /**
     * Lists all kunde entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kundes = $em->getRepository('TEmmaBundle:Kunde')->findAll();

        return $this->render('kunde/index.html.twig', array(
            'kundes' => $kundes,
        ));
    }

    /**
     * Creates a new kunde entity.
     *
     */
    public function newAction(Request $request)
    {
        $kunde = new Kunde();
        $form = $this->createForm('TEmmaBundle\Form\KundeType', $kunde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kunde);
            $em->flush();

            return $this->redirectToRoute('kunde_show', array('kundenr' => $kunde->getKundenr()));
        }

        return $this->render('kunde/new.html.twig', array(
            'kunde' => $kunde,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kunde entity.
     *
     */
    public function showAction(Kunde $kunde)
    {
        $deleteForm = $this->createDeleteForm($kunde);

        return $this->render('kunde/show.html.twig', array(
            'kunde' => $kunde,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kunde entity.
     *
     */
    public function editAction(Request $request, Kunde $kunde)
    {
        $deleteForm = $this->createDeleteForm($kunde);
        $editForm = $this->createForm('TEmmaBundle\Form\KundeType', $kunde);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kunde_edit', array('kundenr' => $kunde->getKundenr()));
        }

        return $this->render('kunde/edit.html.twig', array(
            'kunde' => $kunde,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kunde entity.
     *
     */
    public function deleteAction(Request $request, Kunde $kunde)
    {
        $form = $this->createDeleteForm($kunde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kunde);
            $em->flush();
        }

        return $this->redirectToRoute('kunde_index');
    }

    /**
     * Creates a form to delete a kunde entity.
     *
     * @param Kunde $kunde The kunde entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kunde $kunde)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kunde_delete', array('kundenr' => $kunde->getKundenr())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
