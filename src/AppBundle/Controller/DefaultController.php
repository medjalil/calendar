<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    public function loadCalendarAction(Request $request) {
        /**
         * 
         * @param Request $request
         * @return Response
         */
        $em = $this->getDoctrine()->getManager();
        $events  = $em->getRepository('AppBundle:Event')->findAll(); 
        //dump($events);die();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $return_events = array();

        foreach ($events as $event) {
            $return_events[] = $event->toArray();
        }
       
        $response->setContent(json_encode($return_events));

        return $response;
    }

}
