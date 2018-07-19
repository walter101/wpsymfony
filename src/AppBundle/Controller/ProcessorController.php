<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Processor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Processor controller.
 *
 * @Route("processor")
 */
class ProcessorController extends Controller
{
    /**
     * Lists all processor entities.
     *
     * @Route("/", name="processor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $processors = $em->getRepository('AppBundle:Processor')->findAll();

        return $this->render('processor/index.html.twig', array(
            'processors' => $processors,
        ));
    }

    /**
     * Creates a new processor entity.
     *
     * @Route("/new", name="processor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $processor = new Processor();
        $form = $this->createForm('AppBundle\Form\ProcessorType', $processor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $processor->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $processor->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($processor);
            $em->flush();

            return $this->redirectToRoute('processor_show', array('id' => $processor->getId()));
        }

        return $this->render('processor/new.html.twig', array(
            'processor' => $processor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a processor entity.
     *
     * @Route("/{id}", name="processor_show")
     * @Method("GET")
     */
    public function showAction(Processor $processor)
    {
        $deleteForm = $this->createDeleteForm($processor);

        return $this->render('processor/show.html.twig', array(
            'processor' => $processor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing processor entity.
     *
     * @Route("/{id}/edit", name="processor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Processor $processor)
    {
        $deleteForm = $this->createDeleteForm($processor);
        $editForm = $this->createForm('AppBundle\Form\ProcessorType', $processor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $processor->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $processor->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('processor_edit', array('id' => $processor->getId()));
        }

        return $this->render('processor/edit.html.twig', array(
            'processor' => $processor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a processor entity.
     *
     * @Route("/{id}", name="processor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Processor $processor)
    {
        $form = $this->createDeleteForm($processor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($processor);
            $em->flush();
        }

        return $this->redirectToRoute('processor_index');
    }

    /**
     * Creates a form to delete a processor entity.
     *
     * @param Processor $processor The processor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Processor $processor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('processor_delete', array('id' => $processor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
