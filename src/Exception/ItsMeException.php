<?php

namespace Nascom\ItsmeApiClient\Exception;

/**
 * Class ItsMeException
 *
 * @package Nascom\ItsmeApiClient\Exception
 */
class ItsMeException extends \RuntimeException
{
    /**
     * @param \Throwable $e
     * @return ItsMeException
     */
    public static function fromException(\Throwable $e)
    {
        return new static(
            $e->getMessage(),
            $e->getCode(),
            $e
        );
    }
}
