<?php

namespace miercolesBundle\Controller;

use miercolesBundle\Entity\miercolesEntidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Miercolesentidad controller.
 *
 */
class miercolesEntidadController extends Controller
{
    /**
     * Lists all miercolesEntidad entities.
     *
     */
    public function indexAction(Request $request)
    {
    
    $em = $this->getDoctrine()->getManager();
    
    $miercolesEntidads = $em->getRepository('miercolesBundle:miercolesEntidad')->findAll();

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $miercolesEntidads,
        $request->query->getInt('page', 1)/*page number*/,
        5/*limit per page*/
    );       
        
        
        $em = $this->getDoctrine()->getManager();

        $miercolesEntidads = $em->getRepository('miercolesBundle:miercolesEntidad')->findAll();

        return $this->render('miercolesentidad/index.html.twig', array(
            'miercolesEntidads' => $pagination,
        ));
    }

    /**
     * Creates a new miercolesEntidad entity.
     *
     */
    public function newAction(Request $request)
    {
        $miercolesEntidad = new Miercolesentidad();
        $form = $this->createForm('miercolesBundle\Form\miercolesEntidadType', $miercolesEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($miercolesEntidad);
            $em->flush();

            return $this->redirectToRoute('miercolesentidad_show', array('id' => $miercolesEntidad->getId()));
        }

        return $this->render('miercolesentidad/new.html.twig', array(
            'miercolesEntidad' => $miercolesEntidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a miercolesEntidad entity.
     *
     */
    public function showAction(miercolesEntidad $miercolesEntidad)
    {
        $deleteForm = $this->createDeleteForm($miercolesEntidad);

        return $this->render('miercolesentidad/show.html.twig', array(
            'miercolesEntidad' => $miercolesEntidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing miercolesEntidad entity.
     *
     */
    public function editAction(Request $request, miercolesEntidad $miercolesEntidad)
    {
        $deleteForm = $this->createDeleteForm($miercolesEntidad);
        $editForm = $this->createForm('miercolesBundle\Form\miercolesEntidadType', $miercolesEntidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('miercolesentidad_edit', array('id' => $miercolesEntidad->getId()));
        }

        return $this->render('miercolesentidad/edit.html.twig', array(
            'miercolesEntidad' => $miercolesEntidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a miercolesEntidad entity.
     *
     */
    public function deleteAction(Request $request, miercolesEntidad $miercolesEntidad)
    {
        $form = $this->createDeleteForm($miercolesEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($miercolesEntidad);
            $em->flush();
        }

        return $this->redirectToRoute('miercolesentidad_index');
    }

    /**
     * Creates a form to delete a miercolesEntidad entity.
     *
     * @param miercolesEntidad $miercolesEntidad The miercolesEntidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(miercolesEntidad $miercolesEntidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('miercolesentidad_delete', array('id' => $miercolesEntidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
  
    

    
    
}
