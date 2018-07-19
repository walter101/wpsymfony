<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ColorList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Colorlist controller.
 *
 * @Route("colorlist")
 */
class ColorListController extends Controller
{
    /**
     * Lists all colorList entities.
     *
     * @Route("/", name="colorlist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $colorLists = $em->getRepository('AppBundle:ColorList')->findAll();

        return $this->render('colorlist/index.html.twig', array(
            'colorLists' => $colorLists,
        ));
    }

    /**
     * Creates a new colorList entity.
     *
     * @Route("/new", name="colorlist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $colorList = new Colorlist();
        $form = $this->createForm('AppBundle\Form\ColorListType', $colorList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($colorList);
            $em->flush();

            return $this->redirectToRoute('colorlist_show', array('id' => $colorList->getId()));
        }

        return $this->render('colorlist/new.html.twig', array(
            'colorList' => $colorList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a colorList entity.
     *
     * @Route("/{id}", name="colorlist_show")
     * @Method("GET")
     */
    public function showAction(ColorList $colorList)
    {
        $deleteForm = $this->createDeleteForm($colorList);

        return $this->render('colorlist/show.html.twig', array(
            'colorList' => $colorList,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing colorList entity.
     *
     * @Route("/{id}/edit", name="colorlist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ColorList $colorList)
    {
        $deleteForm = $this->createDeleteForm($colorList);
        $editForm = $this->createForm('AppBundle\Form\ColorListType', $colorList);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('colorlist_edit', array('id' => $colorList->getId()));
        }

        return $this->render('colorlist/edit.html.twig', array(
            'colorList' => $colorList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a colorList entity.
     *
     * @Route("/{id}", name="colorlist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ColorList $colorList)
    {
        $form = $this->createDeleteForm($colorList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($colorList);
            $em->flush();
        }

        return $this->redirectToRoute('colorlist_index');
    }

    /**
     * Creates a form to delete a colorList entity.
     *
     * @param ColorList $colorList The colorList entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ColorList $colorList)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('colorlist_delete', array('id' => $colorList->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
