<?php

namespace Pkerrigan\Xray\Segment;

/**
 * Class DynamoDbSegment
 * @package Pkerrigan\Xray\Segment
 */
class DynamoDbSegment extends AwsSegment
{

    public function __construct()
    {
        $this->name = "DynamoDB";
        parent::__construct();
    }

    /**
     *  For operations on a DynamoDB table, the name of the table.
     * @var string $tableName
     */
    private $tableName;

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     * @return DynamoDbSegment
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();

        $data['aws']['table_name'] = $this->getTableName();

        return array_filter($data);
    }
}
