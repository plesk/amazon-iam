<?php
// Copyright 1999-2018. Plesk International GmbH.

class AmazonIAM
{
    const USERNAME_PREFIX = 'plesk-';

    /**
     * @var \Aws\Iam\IamClient
     */
    protected $iamClient;

    /**
     * @var string
     */
    protected $version = 'latest';

    /**
     * @var string
     */
    protected $region = 'us-east-2';

    protected $arrayUserPolicy = [];
    protected $arrayUserRole = [];


    protected $key;

    protected $secret;

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param $policyArn
     * @return $this
     */
    public function addUserPolicy($policyArn)
    {
        $this->arrayUserPolicy[$policyArn] = $policyArn;
        return $this;
    }

    /**
     * @param $roleName
     * @return $this
     */
    public function addUserRole($roleName)
    {
        $this->arrayUserRole[] = $roleName;
        return $this;
    }

    /**
     * @param $userName
     * @return \Aws\Result
     */
    public function createUser($userName)
    {
        $iamClient = $this->getIAMClient();
        $response = $iamClient->createUser([
            'UserName' => $userName,
        ]);

        if (!empty($this->arrayUserPolicy)) {
            foreach ($this->arrayUserPolicy as $policyArn) {
                $iamClient->attachUserPolicy([
                    'PolicyArn' => $policyArn,
                    'UserName' => $userName,
                ]);
            }

        }
        return $response;
    }

    /**
     * @return \Aws\Iam\IamClient
     */
    public function getIAMClient()
    {
        if (empty($this->iamClient)) {
            $this->iamClient = new \Aws\Iam\IamClient([
                'version' => $this->version,
                'region' => $this->getRegion(),
                'credentials' => [
                    'key' => $this->getKey(),
                    'secret' => $this->getSecret()
                ],
            ]);
        }
        return $this->iamClient;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @param $userName
     * @return \Aws\Result
     */
    public function createAccessKey($userName)
    {
        $iamClient = $this->getIAMClient();
        $responseAccessKey = $iamClient->createAccessKey([
            'UserName' => $userName
        ]);

        return $responseAccessKey;
    }

    /**
     * @param $userName
     * @return bool
     */
    public function deleteUser($userName)
    {
        $res = false;
        if ($this->isExistsUser($userName)) {
            $iamClient = $this->getIAMClient();
            $arrayAttachedPolicy = $this->getUserPolicyList($userName);
            if (!empty($arrayAttachedPolicy)) {

                foreach ($arrayAttachedPolicy as $policy) {
                    $iamClient->detachUserPolicy([
                        'PolicyArn' => $policy->PolicyArn,
                        'UserName' => $userName
                    ]);
                }
            }
            $iamClient->deleteUser([
                'UserName' => $userName
            ]);
            $res = true;
        }
        return $res;
    }

    /**
     * @param $userName
     * @return bool
     */
    public function isExistsUser($userName)
    {
        return (!empty($this->getUser($userName)));
    }

    /**
     * @param $userName
     * @return bool|IAMUser
     */
    public function getUser($userName)
    {
        $res = false;
        try {
            $response = $this->getIAMClient()->getUser([
                'UserName' => $userName
            ]);
            $res = new IAMUser($response->get('User'));
        } catch (\Aws\Exception\AwsException $e) {
            if ($e->getAwsErrorCode() != 'NoSuchEntity') {
                throw $e;
            }

        }
        return $res;
    }

    /**
     * @param $userName
     * @return IAMAttachedPolicy[]|bool
     */
    public function getUserPolicyList($userName)
    {
        $res = false;
        if ($this->isExistsUser($userName)) {
            $response = $this->getIAMClient()->listAttachedUserPolicies([
                'UserName' => $userName
            ]);
            $response = $response->get('AttachedPolicies');
            foreach ($response as $data) {
                $res[] = new IAMAttachedPolicy($data);
            }
        }
        return $res;
    }

    /**
     *
     * @link http://docs.aws.amazon.com/IAM/latest/APIReference/API_ListRoles.html
     *
     * @return IAMRole[]
     */
    public function getRoles()
    {
        $res = [];
        $response = $this->getIAMClient()->listRoles();
        $response = $response->get('Roles');
        foreach ($response as $data) {
            $res[] = new IAMRole($data);
        }
        return $res;
    }

    /**
     * @return IAMPolicy[]
     */
    public function getPolicies()
    {
        $res = [];
        $response = $this->getIAMClient()->listPolicies();
        $response = $response->get('Policies');
        foreach ($response as $data) {
            $res[] = new IAMPolicy($data);
        }
        return $res;
    }

    /**
     * @param bool $prefix
     * @return bool|string
     */
    public function generateIAMUserName($prefix = false)
    {
        if (empty($prefix)) {
            $res = self::USERNAME_PREFIX;
        } else {
            $res = $prefix;
        }


        $hostName = $this->getServerHostName();
        if (strpos($hostName, 'localhost') === 0) {
            $hostName = str_replace('@', '-', $this->getAdminEmail());
        }

        $res .= $hostName;
        $res .= '-' . substr(md5(uniqid(mt_rand(), true)), 0, 8);
        $res = substr($res, 0, 64);
        return $res;
    }

    /**
     * @return string
     */
    protected function getAdminEmail()
    {
        $client = pm_Client::getByLogin('admin');
        return $client->getProperty('email');
    }

    /**
     * @return string
     */
    protected function getServerHostName()
    {
        $request = <<<EOF
  <server>
    <get>
       <gen_info/>
    </get>
  </server>
EOF;
        $rpc = pm_ApiRpc::getService();
        $response = $rpc->call($request);
        return (string)$response->server->get->result->gen_info->server_name;
    }

    /**
     * @param $url
     * @return mixed
     */
    protected function curlGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_URL, $url);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /**
     * @return array|bool
     */
    public function getEc2RoleAccess()
    {
        $res = false;
        $user = $this->curlGet('http://169.254.169.254/latest/meta-data/iam/security-credentials/');
        if (!empty($user)) {
            $accessData = $this->curlGet('http://169.254.169.254/latest/meta-data/iam/security-credentials/' . $user);
            $accessData = json_decode($accessData, true);
            if (!empty($accessData['AccessKeyId']) && !empty($accessData['SecretAccessKey']) ) {
                $res = [
                    'AccessKeyId' => $accessData['AccessKeyId'],
                    'SecretAccessKey' => $accessData['SecretAccessKey'],
                ];
            }
        }

        return $res;
    }

}
