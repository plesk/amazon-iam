<?php
// Copyright 1999-2018. Plesk International GmbH.

require_once 'BaseIAMObject.php';

/**
 * Class IAMPolicyDocument
 *
 * @link https://docs.aws.amazon.com/IAM/latest/APIReference/API_CreatePolicy.html
 *
 * @property string $Version
 * @property string $StatementSid
 * @property string $StatementEffect
 * @property string $StatementResource
 * @property array $StatementAction
 */
class IAMPolicyDocument extends BaseIAMObject
{
    const VERSION = '2012-10-17';

    public function __construct($data)
    {
        if (!isset($data['Version'])) {
            $data['Version'] = self::VERSION;
        }
        if (!isset($data['StatementSid'])) {
            $data['StatementSid'] = false;
        }
        parent::__construct($data);
    }

    public function __toString()
    {
        $statement = [
            'Effect' => $this->StatementEffect,
            'Action' => $this->StatementAction,
            'Resource' => $this->StatementResource
        ];

        $sid = $this->StatementSid;
        if (!empty($sid)) {
            $statement['Sid'] = $sid;
        }

        $jsonData = [
            'Version' => $this->Version,
            'Statement' => $statement
        ];

        return json_encode($jsonData);
    }
}
