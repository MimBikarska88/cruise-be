<?php

namespace App\Data\Exceptions;

use Exception;

class ModelCastException extends Exception
{
    /**
     * Create a new instance.
     *
     * @param  string  $type
     * @param  mixed  $value
     * @return \App\Data\Exceptions\ModelCastException
     */
    public static function cannotCast(string $type, mixed $value): self
    {
        return new self("Could not cast a model: `{$value}` into a `{$type}`");
    }
}

