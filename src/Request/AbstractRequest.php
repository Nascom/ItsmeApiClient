<?php

namespace Nascom\ItsmeApiClient\Request;

/**
 * Class AbstractRequest
 *
 * @package Nascom\ItsmeApiClient\Request
 */
abstract class AbstractRequest implements RequestInterface
{

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @inheritdoc
     */
    abstract public function getUri();

    /**
     * @inheritdoc
     */
    abstract public function getMethod();

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @inheritdoc
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @inheritdoc
     */
    abstract public function getResponseClass();
}