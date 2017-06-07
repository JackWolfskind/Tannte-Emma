<?php

namespace TEmmaBundle\Controller;

use TEmmaBundle\Entity\Geschaefte;
use TEmmaBundle\Entity\Posten;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Geschaefte controller.
 *
 */
class GeschaefteController extends Controller {

    /**
     * Lists all geschaefte entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $geschaeftes = $em->getRepository('TEmmaBundle:Geschaefte')->findAll();
        $mitarbeiterList = [];
        $kundenList = [];
        foreach ($geschaeftes as $geschaeft) {
            array_push($kundenList, $em->getRepository('TEmmaBundle:Kunde')->find($geschaeft->getKundenr()));
            array_push($mitarbeiterList, $em->getRepository('TEmmaBundle:Mitarbeiter')->find($geschaeft->getAngelegtvon()));
        }
        return $this->render('geschaefte/index.html.twig', array(
                    'geschaeftes' => $geschaeftes,
                    'kundenList' => $kundenList,
                    'mitarbeiterList' => $mitarbeiterList,
        ));
    }

    /**
     * Creates a new geschaefte entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $geschaefte = new Geschaefte();
        $posten = new Posten();
        $form = $this->createForm('TEmmaBundle\Form\GeschaefteType', $geschaefte);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($geschaefte);
            $em->flush();

            return $this->redirectToRoute('geschaefte_show', array('geschaeftid' => $geschaefte->getGeschaeftid()));
        }
        return $this->render('geschaefte/new.html.twig', array(
                    'geschaefte' => $geschaefte,
                    'posten' => $posten,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a geschaefte entity.
     *
     */
    public function showAction(Geschaefte $geschaefte) {
        $deleteForm = $this->createDeleteForm($geschaefte);
        $em = $this->getDoctrine()->getManager();
        $kunde = $em->getRepository('TEmmaBundle:Kunde')->find($geschaefte->getKundenr());
        $mitarbeiter = $em->getRepository('TEmmaBundle:Mitarbeiter')->find($geschaefte->getAngelegtvon());
        return $this->render('geschaefte/show.html.twig', array(
                    'geschaefte' => $geschaefte,
                    'kunde' => $kunde,
                    'mitarbeiter' => $mitarbeiter,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing geschaefte entity.
     *
     */
    public function editAction(Request $request, Geschaefte $geschaefte) {
        $deleteForm = $this->createDeleteForm($geschaefte);
        $editForm = $this->createForm('TEmmaBundle\Form\GeschaefteType', $geschaefte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('geschaefte_edit', array('geschaeftid' => $geschaefte->getGeschaeftid()));
        }

        return $this->render('geschaefte/edit.html.twig', array(
                    'geschaefte' => $geschaefte,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a geschaefte entity.
     *
     */
    public function deleteAction(Request $request, Geschaefte $geschaefte) {
        $form = $this->createDeleteForm($geschaefte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($geschaefte);
            $em->flush();
        }

        return $this->redirectToRoute('geschaefte_index');
    }

    /**
     * Creates a form to delete a geschaefte entity.
     *
     * @param Geschaefte $geschaefte The geschaefte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Geschaefte $geschaefte) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('geschaefte_delete', array('geschaeftid' => $geschaefte->getGeschaeftid())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
