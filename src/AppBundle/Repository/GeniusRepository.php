<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class GeniusRepository extends EntityRepository
{

    /**
     * @return genius[]
     */
    public function findAllPublishedOrderBySize(){

        return $this->createQueryBuilder('genius')
            ->andWhere('genius.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->orderBy('genius.speciesCount', 'DESC')
            ->getQuery()
            ->execute();

    }


}