<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Session;
use AppBundle\Entity\ValueObject\Bearer;
use Doctrine\ORM\EntityRepository;

class SessionRepository extends EntityRepository
{
    public function findByToken(Bearer $bearer): ?Session
    {
        /** @var Session $session|null */
        $session = $this->findOneBy([
            'accessToken.token' => (string) $bearer
        ]);

        return $session;
    }
}