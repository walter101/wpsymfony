<?php
use Pimple\Container;
use AppBundle\walter\pimpleclassZipcode;
use AppBundle\walter\pimpleclassCity;

/** @var  $container */
$container = new Container();

// Save some value in the container for perhaps configuration of some kind
$container['test'] = 'Dit is een test waarde uit de pimple container';

// Save an serviceclass in the container using an index (string) name
$container['pimpleclassCity'] = function() use ($container) {
    return new pimpleclassCity();
};

// Save an serviceclass in the container using

// Je kunt hier aangeven dat de index niet een string is maar verwijzen naar een namespace gevolgd door ::class
// Bij het ophalen moet je dan ook verwijzen naar deze namespace \AppBundle\walter\pimpleclassZipcode::class
$container[\AppBundle\walter\pimpleclassZipcode::class] = function() {
    return new pimpleclassZipcode();
};

