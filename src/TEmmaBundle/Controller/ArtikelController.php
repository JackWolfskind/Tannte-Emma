<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Artikel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Artikel controller.
 *
 */
class ArtikelController extends Controller
{
    /**
     * Lists all artikel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artikels = $em->getRepository('TEmmaBundle:Artikel')->findAll();

        return $this->render('artikel/index.html.twig', array(
            'artikels' => $artikels,
        ));
    }

    /**
     * Creates a new artikel entity.
     *
     */
    public function newAction(Request $request)
    {
        $artikel = new Artikel();
        $form = $this->createForm('TEmmaBundle\Form\ArtikelType', $artikel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artikel);
            $em->flush();

            return $this->redirectToRoute('artikel_show', array('artikelnr' => $artikel->getArtikelnr()));
        }

        return $this->render('artikel/new.html.twig', array(
            'artikel' => $artikel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artikel entity.
     *
     */
    public function showAction(Artikel $artikel)
    {
        $deleteForm = $this->createDeleteForm($artikel);

        return $this->render('artikel/show.html.twig', array(
            'artikel' => $artikel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artikel entity.
     *
     */
    public function editAction(Request $request, Artikel $artikel)
    {
        $deleteForm = $this->createDeleteForm($artikel);
        $editForm = $this->createForm('TEmmaBundle\Form\ArtikelType', $artikel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artikel_edit', array('artikelnr' => $artikel->getArtikelnr()));
        }

        return $this->render('artikel/edit.html.twig', array(
            'artikel' => $artikel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artikel entity.
     *
     */
    public function deleteAction(Request $request, Artikel $artikel)
    {
        $form = $this->createDeleteForm($artikel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artikel);
            $em->flush();
        }

        return $this->redirectToRoute('artikel_index');
    }

    /**
     * Creates a form to delete a artikel entity.
     *
     * @param Artikel $artikel The artikel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artikel $artikel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artikel_delete', array('artikelnr' => $artikel->getArtikelnr())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
