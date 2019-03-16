<?php
namespace App\Model\Entity;

/**
 * Class Client
 * @package App\Model\Entity
 * @property Contact $Contact
 */
class Client extends Entity
{
    /**
     * @var int $id
     */
    public $id;
    /**
     * @var string $name
     */
    public $name;
    /**
     * @var string $cpf
     */
    public $cpf;
    /**
     * @var string $cnpj
     */
    public $cnpj;
    /**
     * @var int $contact_id
     */
    public $contact_id;
    /**
     * @var \DateTime $created_at
     */
    public $created_at;
    /**
     * @var \DateTime $updated_at
     */
    public $updated_at;
}