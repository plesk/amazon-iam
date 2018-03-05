<?php
// Copyright 1999-2018. Plesk International GmbH.

require_once 'BaseIAMObject.php';

/**
 *
 * Class IAMRole
 * @link http://docs.aws.amazon.com/IAM/latest/APIReference/API_Role.html
 *
 * @property string $Path
 * @property string $RoleName
 * @property string $RoleId
 * @property string $Arn
 * @property string $AssumeRolePolicyDocument
 * @property string $Description
 * @property Aws\Api\DateTimeResult $CreateDate
 */
class IAMRole extends BaseIAMObject
{
}
