<?php

namespace App\Security\Voter;

use App\Entity\Greeting;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class GreetingVoter extends Voter {

    protected mixed $votingClass = Greeting::class;

    /**
     * @param string $attribute
     * @param Greeting $subject
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool {
        /** ... check if the user is anonymous ... **/

        switch ($attribute) {
            case Greeting::CREATE:
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return true;
                }  // only admins can create Greetings
                break;
            case Greeting::READ:
                return true;
        }

        return false;
    }
}
