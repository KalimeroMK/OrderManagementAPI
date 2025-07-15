<?php

declare(strict_types=1);

namespace App\Modules\Core\Exceptions;

class GeneralSearchException extends GeneralException
{
    /**
     * @var int
     */
    protected $code = 500;

    public function message(): ?string
    {
        return 'Something went wrong while getting data from Database';
    }
}
