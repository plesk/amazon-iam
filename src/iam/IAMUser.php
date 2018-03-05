<?php
// Copyright 1999-2018. Plesk International GmbH.

require_once 'BaseIAMObject.php';

/**
 * Class IAMUser
 * @link http://docs.aws.amazon.com/IAM/latest/APIReference/API_User.html
 *
 * @property string $Arn
 * @property Aws\Api\DateTimeResult $CreateDate
 * @property Aws\Api\DateTimeResult $PasswordLastUsed
 * @property string $Path
 * @property string $UserId
 * @property string $UserName
 *
 */
class IAMUser extends BaseIAMObject
{
}
