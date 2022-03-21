<?php

namespace Pkerrigan\Xray\Segment;

/**
 * Class S3Segment
 * @package Pkerrigan\Xray\Segment
 */
class S3Segment extends AwsSegment
{

    public function __construct()
    {
        $this->name = "S3";
        parent::__construct();
    }

    /**
     *  For operations on S3, the name of the bucket.
     * @var string $bucketName
     */
    private $bucketName;
    /**
     *  For operations on a S3 bucket, the name of the key.
     * @var string $bucketName
     */
    private $key;

    /**
     * @return string
     */
    public function getBucketName()
    {
        return $this->bucketName;
    }

    /**
     * @param string $bucketName
     * @return S3Segment
     */
    public function setBucketName($bucketName)
    {
        $this->bucketName = $bucketName;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return S3Segment
     */
    public function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();

        $data['aws']['bucket_name'] = $this->getBucketName();

        if ($key = $this->getKey()) {
            $data['aws']['key'] = $key;
        }

        return array_filter($data);
    }
}
