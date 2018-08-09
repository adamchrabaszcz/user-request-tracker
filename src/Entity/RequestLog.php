<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestLogRepository")
 */
class RequestLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sessionId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ipAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlRequest;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $postParameters;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $getParameters;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $method;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $fileNames;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $httpReferer;

    /**
     * GetId
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get SessionId
     *
     * @return string
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * Set SessionId
     *
     * @param string $sessionId 
     * @return self
     */
    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get IpAddress
     *
     * @return string
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * Set IpAddress
     *
     * @param string $ipAddress 
     * @return self
     */
    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get UrlRequest
     *
     * @return string
     */
    public function getUrlRequest(): ?string
    {
        return $this->urlRequest;
    }

    /**
     * Set UrlRequest
     *
     * @param string $urlRequest 
     * @return self
     */
    public function setUrlRequest(string $urlRequest): self
    {
        $this->urlRequest = $urlRequest;

        return $this;
    }

    /**
     * Get PostParameters
     *
     * @return array
     */
    public function getPostParameters(): ?array
    {
        return $this->postParameters;
    }

    /**
     * Set PostParameters
     *
     * @param array $postParameters 
     * @return self
     */
    public function setPostParameters(?array $postParameters): self
    {
        $this->postParameters = $postParameters;

        return $this;
    }

    /**
     * Get GetParameters
     *
     * @return array
     */
    public function getGetParameters(): ?array
    {
        return $this->getParameters;
    }

    /**
     * Set GetParameters
     *
     * @param array $getParameters 
     * @return self
     */
    public function setGetParameters(?array $getParameters): self
    {
        $this->getParameters = $getParameters;

        return $this;
    }

    /**
     * Get Method
     *
     * @return string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * Set Method
     *
     * @param string $method 
     * @return self
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get FileNames
     *
     * @return array
     */
    public function getFileNames(): ?array
    {
        return $this->fileNames;
    }

    /**
     * Set FileNames
     *
     * @param array $fileNames 
     * @return self
     */
    public function setFileNames(?array $fileNames): self
    {
        $this->fileNames = $fileNames;

        return $this;
    }

    /**
     * Get HttpReferer
     *
     * @return string
     */
    public function getHttpReferer(): ?string
    {
        return $this->httpReferer;
    }

    /**
     * Set HttpReferer
     *
     * @param string $httpReferer 
     * @return self
     */
    public function setHttpReferer(string $httpReferer): self
    {
        $this->httpReferer = $httpReferer;

        return $this;
    }
}
