<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MemoryTypeList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Memorytypelist controller.
 *
 * @Route("memorytypelist")
 */
class MemoryTypeListController extends Controller
{
    /**
     * Lists all memoryTypeList entities.
     *
     * @Route("/", name="memorytypelist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memoryTypeLists = $em->getRepository('AppBundle:MemoryTypeList')->findAll();

        return $this->render('memorytypelist/index.html.twig', array(
            'memoryTypeLists' => $memoryTypeLists,
        ));
    }

    /**
     * Creates a new memoryTypeList entity.
     *
     * @Route("/new", name="memorytypelist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $memoryTypeList = new Memorytypelist();
        $form = $this->createForm('AppBundle\Form\MemoryTypeListType', $memoryTypeList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($memoryTypeList);
            $em->flush();

            return $this->redirectToRoute('memorytypelist_show', array('id' => $memoryTypeList->getId()));
        }

        return $this->render('memorytypelist/new.html.twig', array(
            'memoryTypeList' => $memoryTypeList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memoryTypeList entity.
     *
     * @Route("/{id}", name="memorytypelist_show")
     * @Method("GET")
     */
    public function showAction(MemoryTypeList $memoryTypeList)
    {
        $deleteForm = $this->createDeleteForm($memoryTypeList);

        return $this->render('memorytypelist/show.html.twig', array(
            'memoryTypeList' => $memoryTypeList,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memoryTypeList entity.
     *
     * @Route("/{id}/edit", name="memorytypelist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MemoryTypeList $memoryTypeList)
    {
        $deleteForm = $this->createDeleteForm($memoryTypeList);
        $editForm = $this->createForm('AppBundle\Form\MemoryTypeListType', $memoryTypeList);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('memorytypelist_edit', array('id' => $memoryTypeList->getId()));
        }

        return $this->render('memorytypelist/edit.html.twig', array(
            'memoryTypeList' => $memoryTypeList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a memoryTypeList entity.
     *
     * @Route("/{id}", name="memorytypelist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MemoryTypeList $memoryTypeList)
    {
        $form = $this->createDeleteForm($memoryTypeList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memoryTypeList);
            $em->flush();
        }

        return $this->redirectToRoute('memorytypelist_index');
    }

    /**
     * Creates a form to delete a memoryTypeList entity.
     *
     * @param MemoryTypeList $memoryTypeList The memoryTypeList entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MemoryTypeList $memoryTypeList)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memorytypelist_delete', array('id' => $memoryTypeList->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
