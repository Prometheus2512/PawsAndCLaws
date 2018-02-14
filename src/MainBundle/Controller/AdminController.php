<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle:admin:index.html.twig');
    }

    public function usertableAction() {
        //access user manager services

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('MainBundle:admin:usertable.html.twig', array('users' =>   $users));
    }
    public function eventstableAction() {
        //access user manager services

        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('MainBundle:Event')->findAll(array('beginningDate' => 'DESC'));

        return $this->render('MainBundle:admin:eventstable.html.twig', array(
            'events' => $events,
        ));}
}
