<?php

namespace App\Model\Entity;

/**
 * Class Space
 * @package App\Model\Entity
 * @property Contact $Contact
 */
class Space extends Entity
{
    public $id;
    public $name;
    public $contact_id;
}