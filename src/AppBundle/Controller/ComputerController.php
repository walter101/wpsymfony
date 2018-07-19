<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Computer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Computer controller.
 *
 * @Route("computer")
 */
class ComputerController extends Controller
{
    /**
     * Lists all computer entities.
     *
     * @Route("/", name="computer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $computers = $em->getRepository('AppBundle:Computer')->findAll();

        return $this->render('computer/index.html.twig', array(
            'computers' => $computers,
        ));
    }

    /**
     * Creates a new computer entity.
     *
     * @Route("/new", name="computer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //dump($request);
        //dump($request->request->);
        //die();
        $computer = new Computer();
        $form = $this->createForm('AppBundle\Form\ComputerType', $computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $computer->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $computer->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($computer);
            $em->flush();

            return $this->redirectToRoute('computer_show', array('id' => $computer->getId()));
        }

        return $this->render('computer/new.html.twig', array(
            'computer' => $computer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a computer entity.
     *
     * @Route("/{id}", name="computer_show")
     * @Method("GET")
     */
    public function showAction(Computer $computer)
    {
        $deleteForm = $this->createDeleteForm($computer);

        return $this->render('computer/show.html.twig', array(
            'computer' => $computer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing computer entity.
     *
     * @Route("/{id}/edit", name="computer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Computer $computer)
    {

        dump($request);


        $deleteForm = $this->createDeleteForm($computer);
        $editForm = $this->createForm('AppBundle\Form\ComputerType', $computer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $computer->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $computer->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('computer_edit', array('id' => $computer->getId()));
        }

        return $this->render('computer/edit.html.twig', array(
            'computer' => $computer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a computer entity.
     *
     * @Route("/{id}", name="computer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Computer $computer)
    {
        $form = $this->createDeleteForm($computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($computer);
            $em->flush();
        }

        return $this->redirectToRoute('computer_index');
    }

    /**
     * Creates a form to delete a computer entity.
     *
     * @param Computer $computer The computer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Computer $computer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('computer_delete', array('id' => $computer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
