<?php
declare(strict_types=1);

namespace GeodisBundle\Resources\config\doctrine;

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
