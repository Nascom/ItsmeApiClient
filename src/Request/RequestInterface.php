<?php

namespace Nascom\ItsmeApiClient\Request;

/**
 * Interface QueryInterface
 *
 * @package Nascom\ItsmeApiClient\Request
 */
interface RequestInterface
{

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @return string
     */
    public function getResponseClass();
}