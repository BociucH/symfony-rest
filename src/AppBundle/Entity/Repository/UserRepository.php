<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param string $lastName
     *
     * @return User
     */
    public function findOneByLastName(string $lastName)
    {
        /** @var User $return */
        $return = $this->findOneBy(['lastName' => $lastName]);

        return $return;
    }

    public function findAllByLastNameOrder(string $field)
    {
        $query = $this->createQueryBuilder('user');
        $query->orderBy("user.$field", 'ASC');

        return $query->getQuery()->getResult();
    }
}