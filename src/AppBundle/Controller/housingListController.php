<?php

namespace AppBundle\Controller;

use AppBundle\Entity\housingList;
use AppBundle\Form\housingListType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Housinglist controller.
 *
 * @Route("housinglist")
 */
class housingListController extends Controller
{
    /**
     * Lists all housingList entities.
     *
     * @Route("/", name="housinglist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $housingLists = $em->getRepository('AppBundle:housingList')->findAll();

        return $this->render('housinglist/index.html.twig', array(
            'housingLists' => $housingLists,
        ));
    }

    /**
     * Creates a new housingList entity.
     *
     * @Route("/new", name="housinglist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $housingList = new Housinglist();
        $form = $this->createForm('AppBundle\Form\housingListType', $housingList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $housingList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $housingList->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($housingList);
            $em->flush();

            return $this->redirectToRoute('housinglist_show', array('id' => $housingList->getId()));
        }

        return $this->render('housinglist/new.html.twig', array(
            'housingList' => $housingList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a housingList entity.
     *
     * @Route("/{id}", name="housinglist_show")
     * @Method("GET")
     */
    public function showAction(housingList $housingList)
    {
        $deleteForm = $this->createDeleteForm($housingList);

        return $this->render('housinglist/show.html.twig', array(
            'housingList' => $housingList,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing housingList entity.
     *
     * @Route("/{id}/edit", name="housinglist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, housingList $housingList)
    {
        $deleteForm = $this->createDeleteForm($housingList);
        $editForm = $this->createForm('AppBundle\Form\housingListType', $housingList);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $housingList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $housingList->setImage($fileName);


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('housinglist_edit', array('id' => $housingList->getId()));
        }

        return $this->render('housinglist/edit.html.twig', array(
            'housingList' => $housingList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a housingList entity.
     *
     * @Route("/{id}", name="housinglist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, housingList $housingList)
    {
        $form = $this->createDeleteForm($housingList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($housingList);
            $em->flush();
        }

        return $this->redirectToRoute('housinglist_index');
    }

    /**
     * Creates a form to delete a housingList entity.
     *
     * @param housingList $housingList The housingList entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(housingList $housingList)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('housinglist_delete', array('id' => $housingList->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
