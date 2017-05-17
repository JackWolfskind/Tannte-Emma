<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Geschaeftsart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Geschaeftsart controller.
 *
 */
class GeschaeftsartController extends Controller
{
    /**
     * Lists all geschaeftsart entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $geschaeftsarts = $em->getRepository('TEmmaBundle:Geschaeftsart')->findAll();

        return $this->render('geschaeftsart/index.html.twig', array(
            'geschaeftsarts' => $geschaeftsarts,
        ));
    }

    /**
     * Creates a new geschaeftsart entity.
     *
     */
    public function newAction(Request $request)
    {
        $geschaeftsart = new Geschaeftsart();
        $form = $this->createForm('TEmmaBundle\Form\GeschaeftsartType', $geschaeftsart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($geschaeftsart);
            $em->flush();

            return $this->redirectToRoute('geschaeftsart_show', array('artid' => $geschaeftsart->getArtid()));
        }

        return $this->render('geschaeftsart/new.html.twig', array(
            'geschaeftsart' => $geschaeftsart,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a geschaeftsart entity.
     *
     */
    public function showAction(Geschaeftsart $geschaeftsart)
    {
        $deleteForm = $this->createDeleteForm($geschaeftsart);

        return $this->render('geschaeftsart/show.html.twig', array(
            'geschaeftsart' => $geschaeftsart,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing geschaeftsart entity.
     *
     */
    public function editAction(Request $request, Geschaeftsart $geschaeftsart)
    {
        $deleteForm = $this->createDeleteForm($geschaeftsart);
        $editForm = $this->createForm('TEmmaBundle\Form\GeschaeftsartType', $geschaeftsart);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('geschaeftsart_edit', array('artid' => $geschaeftsart->getArtid()));
        }

        return $this->render('geschaeftsart/edit.html.twig', array(
            'geschaeftsart' => $geschaeftsart,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a geschaeftsart entity.
     *
     */
    public function deleteAction(Request $request, Geschaeftsart $geschaeftsart)
    {
        $form = $this->createDeleteForm($geschaeftsart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($geschaeftsart);
            $em->flush();
        }

        return $this->redirectToRoute('geschaeftsart_index');
    }

    /**
     * Creates a form to delete a geschaeftsart entity.
     *
     * @param Geschaeftsart $geschaeftsart The geschaeftsart entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Geschaeftsart $geschaeftsart)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('geschaeftsart_delete', array('artid' => $geschaeftsart->getArtid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
