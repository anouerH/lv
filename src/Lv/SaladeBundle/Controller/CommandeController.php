<?php

namespace Lv\SaladeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lv\SaladeBundle\Entity\Commande;
use Lv\SaladeBundle\Entity\CommandeComposante;
use Lv\SaladeBundle\Form\CommandeType;

/**
 * Commande controller.
 *
 * @Route("/commande")
 */
class CommandeController extends Controller
{

    /**
     * Lists all Commande entities.
     *
     * @Route("/", name="commande")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvSaladeBundle:Commande')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Commande entity.
     *
     * @Route("/", name="commande_create")
     * @Method("POST")
     * @Template("LvSaladeBundle:Commande:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Commande();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commande_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Commande entity.
    *
    * @param Commande $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Commande $entity)
    {
        $form = $this->createForm(new CommandeType(), $entity, array(
            'action' => $this->generateUrl('commande_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Commande entity.
     *
     * @Route("/new", name="commande_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Commande();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Commande entity.
     *
     * @Route("/{id}", name="commande_show", requirements={"id" = "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Commande entity.
     *
     * @Route("/{id}/edit", name="commande_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
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
    * Creates a form to edit a Commande entity.
    *
    * @param Commande $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Commande $entity)
    {
        $form = $this->createForm(new CommandeType(), $entity, array(
            'action' => $this->generateUrl('commande_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Commande entity.
     *
     * @Route("/{id}", name="commande_update", requirements={"id" = "\d+"})
     * @Method("PUT")
     * @Template("LvSaladeBundle:Commande:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('commande_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Commande entity.
     *
     * @Route("/{id}", name="commande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvSaladeBundle:Commande')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commande entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commande'));
    }

    /**
     * Creates a form to delete a Commande entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Display current commande.
     *
     * @Route("/overview", name="overview")
     * @Method("GET")
     * @Template("LvSaladeBundle:Commande:overview.html.twig")
     */
    public function overviewAction(){
        //die('test de test');
        $request = $this->getRequest();
        $session = $request->getSession();
        $tokens  =array();
        $entities=array();
        if($session->has('tokens'))
            $tokens = $session->get('tokens');
        
        if(count($tokens)){
            $em = $this->getDoctrine()->getManager();
        
            $entities = $em->getRepository('LvSaladeBundle:Composante')
                ->getOverview(array_keys($tokens));
        }
        
        
        return array(
            'entities' => $entities,
        );
    }

    /**
     * confirm commande
     *
     * @Route("/confirm", name="commande_confirm")
     * @Method("GET")
     * @Template("LvSaladeBundle:Commande:confirm.html.twig")
     */
    public function confirmAction(){
        

        $request = $this->getRequest();
        $session = $request->getSession();
        $tokens  =array();
        $entities=array();
        if($session->has('tokens'))
            $tokens = $session->get('tokens');
        

        if(count($tokens)){
            // Insertion d'une nouvelle commande
           $cmd = new Commande();
                // get current user 
                $user= $this->get('security.context')->getToken()->getUser();
            $cmd->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmd);
            $em->flush();


            foreach ($tokens as $cpte => $data) {
                
                $cmdCpte = new CommandeComposante();

                $cmdCpte->setCommande($cmd->getId());
                $cmdCpte->setComposante($cpte);
                $cmdCpte->setQunatite($data['qte']);
                
                $em->persist($cmdCpte);
                $em->flush();

                //remove session
                $session->remove('tokens');

                

            }

            // Flash Bag
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Votre commande à été bien enregistrée!'
            );


        }
        


        return array(
            
        );
    }
}
