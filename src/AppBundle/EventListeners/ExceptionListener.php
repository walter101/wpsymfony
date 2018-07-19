<?php

namespace AppBundle\EventListeners;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpFoundation\Response;

class ExceptionListener
{

    /**
     * Deze listener is triggerd als je conroller geen response object aflevert
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event){
        $value = $event->getControllerResult();
        $response = new Response();

        // ... somehow customize the Response from the return value

        //die('De controller levert geen responce object af.');
        $event->setResponse($response);

    }


    /**
     * Deze listener triggerd nadat het response object is afgegeven
     * Voordat het response object is verstuurd naar de client
     * Je kunt dus nog aanpassingen maken aan de response net voor deze de deur uit gaat
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event){
        $response = $event->getResponse();
        //dump($response);
        //die('in event listener onKernelResponse'. $response);
        // ... modify the response object
        $event->setResponse($response);

    }

    /**
     * Deze listener triggerd als de controller wordt aangesproken voor deze route
     * De controller is dus nog niet uitgevoerd we zitten net voor dat moment.
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event){
        dump($event);
    }

    /**
     * Deze listener triggerd als het request object binnen komt
     * Nog voor een controller is toegewezen en voordat de request verwerkt wordt
     * Zo kun je aanpassingen doen aan het request object voor verwerking in symfony
     * @param Request $request
     */
    public function onKernelRequest(GetResponseEvent $request){

        dump($request);
        //die('Listener: vang request object op voordat deze verwerkt wordt, kun je hem nog aanpassen.');
    }

    public function onKernelTerminate(Event $event){
        echo 'De response is klaar. Je kunt nu nog wat doen met de data uit het request object.';
        //dump($request);
        dump($event);
        dump($event);

        die('Stop na kernet terminate event');
    }
}