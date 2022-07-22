<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Twig\Node\Expression\Binary\GreaterEqualBinary;

class Entity {

    /**
     * Zugriffs-Konstanten
     */
    const CREATE = 'ENTITY_CREATE';
    const EDIT = 'ENTITY_EDIT';
    const READ = 'ENTITY_READ';
    const DELETE = 'ENTITY_DELETE';

    /**
     * Zugriffs-Attribute
     */
    const ACCESS_ATTRIBUTES = array(
        self::CREATE,
        self::EDIT,
        self::READ,
        self::DELETE
    );
}
