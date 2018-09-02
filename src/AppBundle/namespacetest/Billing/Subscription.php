<?php

namespace AppBundle\namespacetest\Billing;


use AppBundle\namespacetest\Contacts\donor;

class Subscription
{

    public function subscribe($name){

        // Doordat Recept.php in dezelfde namespace zit kun je gewoon new Recept() gebruiken
        $recept = new Recept();
        $receptstring = $recept->showrecept();

        // Doordat donor.php in andere namespace zit moet je een use statement opnemen anders kan php de class niet vinden
        $donor = new donor();
        $donortext = $donor->addDonor('Walter');

        //$recept = 'test';
        return $name." is nu een lid. Ik heb een recept: ".$receptstring. ' er is een nieuwe donor geadd: '.$donortext;
    }
}