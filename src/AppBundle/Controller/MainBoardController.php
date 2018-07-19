<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MainBoard;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mainboard controller.
 *
 * @Route("mainboard")
 */
class MainBoardController extends Controller
{
    /**
     * Lists all mainBoard entities.
     *
     * @Route("/", name="mainboard_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mainBoards = $em->getRepository('AppBundle:MainBoard')->findAll();

        return $this->render('mainboard/index.html.twig', array(
            'mainBoards' => $mainBoards,
        ));
    }

    /**
     * Creates a new mainBoard entity.
     *
     * @Route("/new", name="mainboard_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mainBoard = new Mainboard();
        $form = $this->createForm('AppBundle\Form\MainBoardType', $mainBoard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $mainBoard->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $mainBoard->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($mainBoard);
            $em->flush();

            return $this->redirectToRoute('mainboard_show', array('id' => $mainBoard->getId()));
        }

        return $this->render('mainboard/new.html.twig', array(
            'mainBoard' => $mainBoard,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mainBoard entity.
     *
     * @Route("/{id}", name="mainboard_show")
     * @Method("GET")
     */
    public function showAction(MainBoard $mainBoard)
    {
        $deleteForm = $this->createDeleteForm($mainBoard);

        return $this->render('mainboard/show.html.twig', array(
            'mainBoard' => $mainBoard,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mainBoard entity.
     *
     * @Route("/{id}/edit", name="mainboard_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MainBoard $mainBoard)
    {
        $deleteForm = $this->createDeleteForm($mainBoard);
        $editForm = $this->createForm('AppBundle\Form\MainBoardType', $mainBoard);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $mainBoard->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $mainBoard->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mainboard_edit', array('id' => $mainBoard->getId()));
        }

        return $this->render('mainboard/edit.html.twig', array(
            'mainBoard' => $mainBoard,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mainBoard entity.
     *
     * @Route("/{id}", name="mainboard_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MainBoard $mainBoard)
    {
        $form = $this->createDeleteForm($mainBoard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mainBoard);
            $em->flush();
        }

        return $this->redirectToRoute('mainboard_index');
    }

    /**
     * Creates a form to delete a mainBoard entity.
     *
     * @param MainBoard $mainBoard The mainBoard entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MainBoard $mainBoard)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mainboard_delete', array('id' => $mainBoard->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
