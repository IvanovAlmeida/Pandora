<?php
/**
 * Created by PhpStorm.
 * User: ivano
 * Date: 11/03/2019
 * Time: 08:43
 */

namespace App\Resources\Exceptions;

use Throwable;

class MissingTableModelException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}