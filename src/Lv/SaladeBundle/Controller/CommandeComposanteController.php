<?php

namespace Lv\SaladeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lv\SaladeBundle\Entity\CommandeComposante;
use Lv\SaladeBundle\Form\CommandeComposanteType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * CommandeComposante controller.
 *
 * @Route("/commandecomposante")
 */
class CommandeComposanteController extends Controller
{

    /**
     * Lists all CommandeComposante entities.
     *
     * @Route("/", name="commandecomposante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
       $em = $this->getDoctrine()->getManager();
        $familles = $em->getRepository('LvSaladeBundle:Famille')->getWithComposantes();
        

        foreach($familles as $famille) {
            $famille->setActiveComposantes($em->getRepository('LvSaladeBundle:Composante')
                ->getActiveComposantes($famille->getId()));
        }


        //$entities = $em->getRepository('LvSaladeBundle:Composante')->findAll();

        return array(
            //'entities' => $entities,
            'familles'=> $familles,
        );

    }
    /**
     * Creates a new CommandeComposante entity.
     *
     * @Route("/", name="commandecomposante_create")
     * @Method("POST")
     * @Template("LvSaladeBundle:CommandeComposante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CommandeComposante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commandecomposante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CommandeComposante entity.
    *
    * @param CommandeComposante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CommandeComposante $entity)
    {
        $form = $this->createForm(new CommandeComposanteType(), $entity, array(
            'action' => $this->generateUrl('commandecomposante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CommandeComposante entity.
     *
     * @Route("/new", name="commandecomposante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CommandeComposante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CommandeComposante entity.
     *
     * @Route("/{id}", name="commandecomposante_show", requirements={"id" = "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:CommandeComposante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CommandeComposante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CommandeComposante entity.
     *
     * @Route("/{id}/edit", name="commandecomposante_edit", requirements={"id" = "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:CommandeComposante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CommandeComposante entity.');
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
    * Creates a form to edit a CommandeComposante entity.
    *
    * @param CommandeComposante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CommandeComposante $entity)
    {
        $form = $this->createForm(new CommandeComposanteType(), $entity, array(
            'action' => $this->generateUrl('commandecomposante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CommandeComposante entity.
     *
     * @Route("/{id}", name="commandecomposante_update")
     * @Method("PUT")
     * @Template("LvSaladeBundle:CommandeComposante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvSaladeBundle:CommandeComposante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CommandeComposante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('commandecomposante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CommandeComposante entity.
     *
     * @Route("/{id}", name="commandecomposante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvSaladeBundle:CommandeComposante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CommandeComposante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commandecomposante'));
    }

    /**
     * Creates a form to delete a CommandeComposante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commandecomposante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * add composante to cart 
     *
     * @Route("/add-to-cart", name="addToCart")
     * @Method("GET")
     * @Template()
     */
    public function addToCartAction(){
        $request = $this->getRequest();
        $id = $request->get('id');
        $price = $request->get('price');
        $session = $request->getSession();
        $sumPrice = 0.00;
        if($session->has('tokens')){
            $tokens = $session->get('tokens');
            $tokens[$id] = array('qte' => 1, 'price'=> $price);;
            $session->set('tokens', $tokens);
            foreach ($tokens as $key => $value) {
                $sumPrice += $value['price'];
            }
        }else{
            $tokens[$id] = array('qte' => 1, 'price'=> $price);;
            $session->set('tokens', $tokens);
            $sumPrice +=$price;
        }



        $return['length'] = count($session->get('tokens'));
        $return['sumprice'] = $sumPrice;
        $return['data'] = $session->get('tokens');

        $return=json_encode($return);//jscon encode the array
        return new Response($return,200,array('Content-Type'=>'application/json'));

    }

    /**
     * remove composante from cart 
     *
     * @Route("/remove-from-cart", name="RemoveFromCart")
     * @Method("GET")
     * @Template()
     */
    public function RemoveFromCartAction(){
        $request = $this->getRequest();
        $id = $request->get('id');
        $session = $request->getSession();
        $sumPrice = 0.00;
        if($session->has('tokens')){
            $tokens = $session->get('tokens');
            unset($tokens[$id]);
            $session->set('tokens', $tokens);
            foreach ($tokens as $key => $value) {
                $sumPrice += $value['price'];
            }
        }
        $return['length'] = count($session->get('tokens'));
        $return['sumprice'] = $sumPrice;
        $return['data'] = $session->get('tokens');
        $return=json_encode($return);//jscon encode the array
        return new Response($return,200,array('Content-Type'=>'application/json'));

    }
}
