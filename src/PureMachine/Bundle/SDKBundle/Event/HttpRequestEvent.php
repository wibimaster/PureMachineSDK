<?php

namespace PureMachine\Bundle\SDKBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;

/**
 * Event dispatched after the local or remote call
 * is executed
 */
class HttpRequestEvent extends Event
{
    /**
     * @var BaseStore
     */
    private $inputData;

    /**
     * @var BaseStore
     */
    private $outputData;

    /**
     * @var string
     */
    private $originalUrl;

    /**
     * @var string
     */
    private $method;

    /**
     * @var integer
     */
    private $httpAnswerCode;

    /**
     * @var array
     */
    private $metadata;

    public function __construct(
        $inputData,
        $outputData,
        $originalUrl,
        $method,
        $httpAnswerCode,
        $metadata = array()
    )
    {
        $this->inputData = $inputData;
        $this->outputData = $outputData;
        $this->originalUrl = $originalUrl;
        $this->method = $method;
        $this->httpAnswerCode = $httpAnswerCode;
        $this->metadata = $metadata;
    }

    /**
     * Return outputData
     *
     * @return BaseStore
     */
    public function getInputData()
    {
        return $this->inputData;
    }

    /**
     * Return outputData
     *
     * @return BaseStore
     */
    public function getOutputData()
    {
        return $this->outputData;
    }

    /**
     * @return string
     */
    public function getOriginalUrl()
    {
        return $this->originalUrl;
    }

    /**
     * HTTP method used : GET or POST
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return integer
     */
    public function getHttpAnswerCode()
    {
        return $this->httpAnswerCode;
    }

    public function getMetadata($key=null)
    {
        if (!$key) return $this->metadata;
        if (array_key_exists($key, $this->metadata)) {
            return $this->metadata[$key];
        }

        return null;
    }
}
