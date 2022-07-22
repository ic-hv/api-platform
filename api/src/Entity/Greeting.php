<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(
    operations: [
        new GetCollection(security: "is_granted('" . Greeting::READ . "')"),
        new Get(security: "is_granted('" . Greeting::READ . "', object)"),
        new Post(securityPostDenormalize: "is_granted('" . Greeting::CREATE . "', object)"),
        //new Put(security: "is_granted('" . Greeting::EDIT . "', object)"), // PUT wollen wir nicht, PATCH is the way to go
        new Patch(security: "is_granted('" . Greeting::EDIT . "', object)"),
        new Delete(security: "is_granted('" . Greeting::DELETE . "', object)")
    ]
)]
#[ORM\Entity]
class Greeting extends Entity {

    const CREATE = 'GREETING_CREATE';
    const EDIT = 'GREETING_EDIT';
    const READ = 'GREETING_READ';
    const DELETE = 'GREETING_DELETE';

    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    public function getId(): ?int {
        return $this->id;
    }
}
