<?php

declare(strict_types=1);

namespace App\Modules\Permission\Exceptions;

use Exception;

class PermissionStoreException extends Exception
{
    public function __construct(string $message = 'Failed to store Permission.', int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
