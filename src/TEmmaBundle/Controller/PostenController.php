<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Posten;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Posten controller.
 *
 */
class PostenController extends Controller
{
    /**
     * Lists all posten entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $postens = $em->getRepository('TEmmaBundle:Posten')->findAll();

        return $this->render('posten/index.html.twig', array(
            'postens' => $postens,
        ));
    }

    /**
     * Creates a new posten entity.
     *
     */
    public function newAction(Request $request)
    {
        $posten = new Posten();
        $form = $this->createForm('TEmmaBundle\Form\PostenType', $posten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($posten);
            $em->flush();

            return $this->redirectToRoute('posten_show', array('postenid' => $posten->getPostenid()));
        }

        return $this->render('posten/new.html.twig', array(
            'posten' => $posten,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a posten entity.
     *
     */
    public function showAction(Posten $posten)
    {
        $deleteForm = $this->createDeleteForm($posten);

        return $this->render('posten/show.html.twig', array(
            'posten' => $posten,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing posten entity.
     *
     */
    public function editAction(Request $request, Posten $posten)
    {
        $deleteForm = $this->createDeleteForm($posten);
        $editForm = $this->createForm('TEmmaBundle\Form\PostenType', $posten);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('posten_edit', array('postenid' => $posten->getPostenid()));
        }

        return $this->render('posten/edit.html.twig', array(
            'posten' => $posten,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a posten entity.
     *
     */
    public function deleteAction(Request $request, Posten $posten)
    {
        $form = $this->createDeleteForm($posten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($posten);
            $em->flush();
        }

        return $this->redirectToRoute('posten_index');
    }

    /**
     * Creates a form to delete a posten entity.
     *
     * @param Posten $posten The posten entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Posten $posten)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posten_delete', array('postenid' => $posten->getPostenid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
