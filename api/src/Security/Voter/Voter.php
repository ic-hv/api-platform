<?php

namespace App\Security\Voter;

use App\Entity\Entity;
use Symfony\Component\Security\Core\Security;

abstract class Voter extends \Symfony\Component\Security\Core\Authorization\Voter\Voter {

    protected ?Security $security = null;

    /**
     * @var Entity
     */
    protected mixed $votingClass = Entity::class;

    public function __construct(Security $security) {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool {

        if ($subject === null) {
            return ($attribute === $this->votingClass::READ);
        }

        return (in_array($attribute, $this->votingClass::ACCESS_ATTRIBUTES) && $subject instanceof $this->votingClass);
    }
}
