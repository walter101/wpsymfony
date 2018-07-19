<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MemoryList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Memorylist controller.
 *
 * @Route("memorylist")
 */
class MemoryListController extends Controller
{
    /**
     * Lists all memoryList entities.
     *
     * @Route("/", name="memorylist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memoryLists = $em->getRepository('AppBundle:MemoryList')->findAll();

        return $this->render('memorylist/index.html.twig', array(
            'memoryLists' => $memoryLists,
        ));
    }

    /**
     * Creates a new memoryList entity.
     *
     * @Route("/new", name="memorylist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $memoryList = new Memorylist();
        $form = $this->createForm('AppBundle\Form\MemoryListType', $memoryList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $memoryList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $memoryList->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($memoryList);
            $em->flush();

            return $this->redirectToRoute('memorylist_show', array('id' => $memoryList->getId()));
        }

        return $this->render('memorylist/new.html.twig', array(
            'memoryList' => $memoryList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memoryList entity.
     *
     * @Route("/{id}", name="memorylist_show")
     * @Method("GET")
     */
    public function showAction(MemoryList $memoryList)
    {
        $deleteForm = $this->createDeleteForm($memoryList);

        return $this->render('memorylist/show.html.twig', array(
            'memoryList' => $memoryList,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memoryList entity.
     *
     * @Route("/{id}/edit", name="memorylist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MemoryList $memoryList)
    {
        $deleteForm = $this->createDeleteForm($memoryList);
        $editForm = $this->createForm('AppBundle\Form\MemoryListType', $memoryList);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $memoryList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $memoryList->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('memorylist_edit', array('id' => $memoryList->getId()));
        }

        return $this->render('memorylist/edit.html.twig', array(
            'memoryList' => $memoryList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a memoryList entity.
     *
     * @Route("/{id}", name="memorylist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MemoryList $memoryList)
    {
        $form = $this->createDeleteForm($memoryList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memoryList);
            $em->flush();
        }

        return $this->redirectToRoute('memorylist_index');
    }

    /**
     * Creates a form to delete a memoryList entity.
     *
     * @param MemoryList $memoryList The memoryList entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MemoryList $memoryList)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memorylist_delete', array('id' => $memoryList->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
