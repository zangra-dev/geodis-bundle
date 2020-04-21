<?php

namespace GeodisBundle\Doctrine\ORM;

use Doctrine\ORM\EntityRepository;

class GeodisRepository extends EntityRepository
{
    public function findLast()
    {
        $qb = $this->createQueryBuilder('e');
        $qb->setMaxResults(1);
        $qb->orderBy('e.id', 'DESC');

        return $qb->getQuery()->getOneOrNullResult();
    }
}
