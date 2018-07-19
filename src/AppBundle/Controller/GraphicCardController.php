<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GraphicCard;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Graphiccard controller.
 *
 * @Route("graphiccard")
 */
class GraphicCardController extends Controller
{
    /**
     * Lists all graphicCard entities.
     *
     * @Route("/", name="graphiccard_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $graphicCards = $em->getRepository('AppBundle:GraphicCard')->findAll();

        return $this->render('graphiccard/index.html.twig', array(
            'graphicCards' => $graphicCards,
        ));
    }

    /**
     * Creates a new graphicCard entity.
     *
     * @Route("/new", name="graphiccard_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $graphicCard = new Graphiccard();
        $form = $this->createForm('AppBundle\Form\GraphicCardType', $graphicCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $graphicCard->getImage();

            $fileName = time().'.'.$file->guessExtension();


            $file->move(
                $this->getParameter('image_upload_directory'),
                $fileName
            );

            $graphicCard->setImage($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($graphicCard);
            $em->flush();

            return $this->redirectToRoute('graphiccard_show', array('id' => $graphicCard->getId()));
        }

        return $this->render('graphiccard/new.html.twig', array(
            'graphicCard' => $graphicCard,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a graphicCard entity.
     *
     * @Route("/{id}", name="graphiccard_show")
     * @Method("GET")
     */
    public function showAction(GraphicCard $graphicCard)
    {
        $deleteForm = $this->createDeleteForm($graphicCard);

        return $this->render('graphiccard/show.html.twig', array(
            'graphicCard' => $graphicCard,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing graphicCard entity.
     *
     * @Route("/{id}/edit", name="graphiccard_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GraphicCard $graphicCard)
    {

        $graphicCard->chosenMemory = $graphicCard->getMemory();

        $deleteForm = $this->createDeleteForm($graphicCard);
        $editForm = $this->createForm('AppBundle\Form\GraphicCardType', $graphicCard);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $graphicCard->getImage();

            if(isset($file)) {

                $fileName = time() . '.' . $file->guessExtension();


                $file->move(
                    $this->getParameter('image_upload_directory'),
                    $fileName
                );

                $graphicCard->setImage($fileName);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('graphiccard_edit', array('id' => $graphicCard->getId()));
        }

        return $this->render('graphiccard/edit.html.twig', array(
            'graphicCard' => $graphicCard,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a graphicCard entity.
     *
     * @Route("/{id}", name="graphiccard_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GraphicCard $graphicCard)
    {
        $form = $this->createDeleteForm($graphicCard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($graphicCard);
            $em->flush();
        }

        return $this->redirectToRoute('graphiccard_index');
    }

    /**
     * Creates a form to delete a graphicCard entity.
     *
     * @param GraphicCard $graphicCard The graphicCard entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GraphicCard $graphicCard)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('graphiccard_delete', array('id' => $graphicCard->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
