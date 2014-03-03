<?php

namespace Lv\SaladeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lv\SaladeBundle\Entity\Composante;
use Lv\SaladeBundle\Form\ComposanteType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Composante controller.
 *
 * @Route("/composante")
 */
class ComposanteController extends Controller
{

    /**
     * Lists all Composante entities.
     *
     * @Route("/", name="composante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvSaladeBundle:Composante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Composante entity.
     *
     * @Route("/", name="composante_create")
     * @Method("POST")
     * @Template("LvSaladeBundle:Composante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Composante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('composante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Composante entity.
    *
    * @param Composante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Composante $entity)
    {
        $form = $this->createForm(new ComposanteType(), $entity, array(
            'action' => $this->generateUrl('composante_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Composante entity.
     *
     * @Route("/new", name="composante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Composante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Composante entity.
     *
     * @Route("/{id}", name="composante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Composante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Composante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Composante entity.
     *
     * @Route("/{id}/edit", name="composante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Composante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Composante entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Composante entity.
    *
    * @param Composante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Composante $entity)
    {
        $form = $this->createForm(new ComposanteType(), $entity, array(
            'action' => $this->generateUrl('composante_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Composante entity.
     *
     * @Route("/{id}", name="composante_update")
     * @Method("POST")
     * @Template("LvSaladeBundle:Composante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Composante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Composante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('composante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Composante entity.
     *
     * @Route("/{id}", name="composante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvSaladeBundle:Composante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Composante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('composante'));
    }

    /**
     * Creates a form to delete a Composante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('composante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     *
     * @Route("/upload", name="composante_upload")
     * @Template()
     */
    public function uploadAction()
    {
        $editId = $this->getRequest()->get('editId');
        if (!preg_match('/^\d+$/', $editId))
        {
            //throw new Exception("Bad edit id");
        }

        $this->get('punk_ave.file_uploader')->handleFileUpload(array('folder' => 'tmp/attachments/' . $editId));
    }


}
