<?php

namespace AppBundle\Controller;

use AppBundle\Entity\OperatingSystemList;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Operatingsystemlist controller.
 *
 * @Route("operatingsystemlist")
 */
class OperatingSystemListController extends Controller
{
    /**
     * Lists all operatingSystemList entities.
     *
     * @Route("/", name="operatingsystemlist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operatingSystemLists = $em->getRepository('AppBundle:OperatingSystemList')->findAll();

        return $this->render('operatingsystemlist/index.html.twig', array(
            'operatingSystemLists' => $operatingSystemLists,
        ));
    }

    /**
     * Creates a new operatingSystemList entity.
     *
     * @Route("/new", name="operatingsystemlist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operatingSystemList = new Operatingsystemlist();
        $form = $this->createForm('AppBundle\Form\OperatingSystemListType', $operatingSystemList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $operatingSystemList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $operatingSystemList->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($operatingSystemList);
            $em->flush();

            return $this->redirectToRoute('operatingsystemlist_show', array('id' => $operatingSystemList->getId()));
        }

        return $this->render('operatingsystemlist/new.html.twig', array(
            'operatingSystemList' => $operatingSystemList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operatingSystemList entity.
     *
     * @Route("/{id}", name="operatingsystemlist_show")
     * @Method("GET")
     */
    public function showAction(OperatingSystemList $operatingSystemList)
    {
        $deleteForm = $this->createDeleteForm($operatingSystemList);

        return $this->render('operatingsystemlist/show.html.twig', array(
            'operatingSystemList' => $operatingSystemList,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operatingSystemList entity.
     *
     * @Route("/{id}/edit", name="operatingsystemlist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OperatingSystemList $operatingSystemList)
    {
        $deleteForm = $this->createDeleteForm($operatingSystemList);
        $editForm = $this->createForm('AppBundle\Form\OperatingSystemListType', $operatingSystemList);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $operatingSystemList->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $operatingSystemList->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operatingsystemlist_edit', array('id' => $operatingSystemList->getId()));
        }

        return $this->render('operatingsystemlist/edit.html.twig', array(
            'operatingSystemList' => $operatingSystemList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operatingSystemList entity.
     *
     * @Route("/{id}", name="operatingsystemlist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OperatingSystemList $operatingSystemList)
    {
        $form = $this->createDeleteForm($operatingSystemList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operatingSystemList);
            $em->flush();
        }

        return $this->redirectToRoute('operatingsystemlist_index');
    }

    /**
     * Creates a form to delete a operatingSystemList entity.
     *
     * @param OperatingSystemList $operatingSystemList The operatingSystemList entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OperatingSystemList $operatingSystemList)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operatingsystemlist_delete', array('id' => $operatingSystemList->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
