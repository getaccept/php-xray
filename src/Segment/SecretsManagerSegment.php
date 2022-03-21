<?php

namespace Pkerrigan\Xray\Segment;

/**
 * Class SecretsManagerSegment
 * @package Pkerrigan\Xray\Segment
 */
class SecretsManagerSegment extends AwsSegment
{

    public function __construct()
    {
        $this->name = "SecretsManager";
        parent::__construct();
    }

    /**
     *  For operations in SecretsManager, the id of the secret.
     * @var string $bucketName
     */
    private $secretId;

    /**
     * @return string
     */
    public function getSecretId()
    {
        return $this->secretId;
    }

    /**
     * @param string $secretId
     * @return SecretsManagerSegment
     */
    public function setSecretId($secretId)
    {
        $this->secretId = $secretId;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();

        $data['aws']['secret_id'] = $this->getSecretId();

        return array_filter($data);
    }
}
