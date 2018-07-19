<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 27-2-2018
 * Time: 11:59
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ComputerRepository extends EntityRepository
{

    public function haal(){

        return $this->createQueryBuilder('computer')
//            ->andWhere('computer.name = :computername')
//            ->setParameter('computername', 'test')
            ->innerJoin('computer.graphicCard', 'g')

//            ->andWhere('g.id = :myID')
//            ->setParameter('myID', 3)

                //
            ->andWhere('g.id IN (:ids) ')
            ->setParameter('ids', [1, 3])


            ->getQuery()
            ->execute();

    }

    public function Customquery1(){

        // Query for a computer entity
        // Join the graphicCard entity who haS A ManyToOne relation on this computer entity
        //  Only select the computer entities where the graphicCard id is 1 or 3
        // Door de join haal je de gegevens van graphicCard op
        // Daardoor kun je eisen stellen aan die gegevens ....
        return $this->createQueryBuilder('computer')
        ->innerJoin('computer.graphicCard', 'g')
        ->andWhere('g.id IN (:ids) ')
        ->setParameter('ids', [1, 3])
        ->getQuery()
        ->execute();

    }

    public function customQuery24(){

        //$em = $this->getDoctrine()->getManager();

        $qb = $this->createQueryBuilder('computer');

        $qb->join('computer.graphicCard', 'graphicCard');

        $qb->where('graphicCard.id = :id');
        $qb->setParameter('id', 3);

        return $qb->getQuery()->getResult();

        //$qb->select

    }

    public function customQuery3(){

        // Create the queryBuilder
        $qb = $this->createQueryBuilder('computer');

        // Join a related entity
        $qb->join('computer.graphicCard', 'graphicCard');

        // Condition on graphicCard.id to be one of the values in an array
        $qb->where('graphicCard.id IN (:ids)');
        $qb->setParameter('ids', array(1,3));

        // Return result
        return $qb->getQuery()->getResult();


    }


    // Query for computer using possible filters
    public function QueryComputerByFilters($session)
    {

        $qb = $this->createQueryBuilder('computer');

        // Join the related entities
        $qb->join('computer.memory', 'memory');
        $qb->join('computer.processor', 'processor');

        // If any memoryvalue selected filter the computer list for this memoryOption
        if (!empty($session->get('filterArray')['filterMemory'])){
            $qb->andWhere('memory.memoryOption = :chosenMemory');
            $qb->setParameter('chosenMemory', $session->get('filterArray')['filterMemory'] );
        }

        // If any processorValue selected filter the computer list for this processor
        if(!empty($session->get('filterArray')['filterProcessor'])){
            $qb->andWhere('processor.name = :chosenProcessor');
            $qb->setParameter('chosenProcessor', $session->get('filterArray')['filterProcessor']);
        }



        dump($session);
        dump($session->get('filterArray')['filterMemory']);

        return $qb->getQuery()->getResult();

    }
}