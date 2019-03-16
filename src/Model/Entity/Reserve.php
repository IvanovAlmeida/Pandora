<?php
namespace App\Model\Entity;

/**
 * Class Reserve
 * @package App\Model\Entity
 *
 * @property Item[] Items
 * @property Service[] Services
 * @property Client $Cliente
 * @property Space $Space
 */
class Reserve extends Entity
{
    public $id;
    public $space_id;
    public $client_id;
    public $value;
    public $entry;
    public $eventDate;
    public $eventName;
    public $updated_at;
    public $created_at;
}