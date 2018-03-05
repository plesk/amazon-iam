<?php
// Copyright 1999-2018. Plesk International GmbH.

require_once 'BaseIAMObject.php';

/**
 *
 * Class IAMPolicy
 * @link http://docs.aws.amazon.com/IAM/latest/APIReference/API_Policy.html
 *
 * @property string $Arn
 * @property int $AttachmentCount
 * @property Aws\Api\DateTimeResult $CreateDate
 * @property string $DefaultVersionId
 * @property string $Description
 * @property bool $IsAttachable
 * @property string $Path
 * @property string $PolicyId
 * @property string $PolicyName
 * @property Aws\Api\DateTimeResult $UpdateDate
 */
class IAMPolicy extends BaseIAMObject
{
    const AWSDirectConnectReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSDirectConnectReadOnlyAccess';
    const AmazonGlacierReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonGlacierReadOnlyAccess';
    const AWSMarketplaceFullAccess = 'arn:aws:iam::aws:policy/AWSMarketplaceFullAccess';
    const AutoScalingConsoleReadOnlyAccess = 'arn:aws:iam::aws:policy/AutoScalingConsoleReadOnlyAccess';
    const AmazonDMSRedshiftS3Role = 'arn:aws:iam::aws:policy/service-role/AmazonDMSRedshiftS3Role';
    const AWSQuickSightListIAM = 'arn:aws:iam::aws:policy/service-role/AWSQuickSightListIAM';
    const AWSHealthFullAccess = 'arn:aws:iam::aws:policy/AWSHealthFullAccess';
    const AmazonRDSFullAccess = 'arn:aws:iam::aws:policy/AmazonRDSFullAccess';
    const SupportUser = 'arn:aws:iam::aws:policy/job-function/SupportUser';
    const AmazonEC2FullAccess = 'arn:aws:iam::aws:policy/AmazonEC2FullAccess';
    const AWSElasticBeanstalkReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSElasticBeanstalkReadOnlyAccess';
    const AWSCertificateManagerReadOnly = 'arn:aws:iam::aws:policy/AWSCertificateManagerReadOnly';
    const AWSQuicksightAthenaAccess = 'arn:aws:iam::aws:policy/service-role/AWSQuicksightAthenaAccess';
    const AWSCodeCommitPowerUser = 'arn:aws:iam::aws:policy/AWSCodeCommitPowerUser';
    const AWSCodeCommitFullAccess = 'arn:aws:iam::aws:policy/AWSCodeCommitFullAccess';
    const IAMSelfManageServiceSpecificCredentials = 'arn:aws:iam::aws:policy/IAMSelfManageServiceSpecificCredentials';
    const AmazonSQSFullAccess = 'arn:aws:iam::aws:policy/AmazonSQSFullAccess';
    const AWSLambdaFullAccess = 'arn:aws:iam::aws:policy/AWSLambdaFullAccess';
    const AWSIoTLogging = 'arn:aws:iam::aws:policy/service-role/AWSIoTLogging';
    const AmazonEC2RoleforSSM = 'arn:aws:iam::aws:policy/service-role/AmazonEC2RoleforSSM';
    const AWSCloudHSMRole = 'arn:aws:iam::aws:policy/service-role/AWSCloudHSMRole';
    const IAMFullAccess = 'arn:aws:iam::aws:policy/IAMFullAccess';
    const AmazonInspectorFullAccess = 'arn:aws:iam::aws:policy/AmazonInspectorFullAccess';
    const AmazonElastiCacheFullAccess = 'arn:aws:iam::aws:policy/AmazonElastiCacheFullAccess';
    const AWSAgentlessDiscoveryService = 'arn:aws:iam::aws:policy/AWSAgentlessDiscoveryService';
    const AWSXrayWriteOnlyAccess = 'arn:aws:iam::aws:policy/AWSXrayWriteOnlyAccess';
    const AutoScalingReadOnlyAccess = 'arn:aws:iam::aws:policy/AutoScalingReadOnlyAccess';
    const AutoScalingFullAccess = 'arn:aws:iam::aws:policy/AutoScalingFullAccess';
    const AmazonEC2RoleforAWSCodeDeploy = 'arn:aws:iam::aws:policy/service-role/AmazonEC2RoleforAWSCodeDeploy';
    const AWSMobileHub_ReadOnly = 'arn:aws:iam::aws:policy/AWSMobileHub_ReadOnly';
    const CloudWatchEventsBuiltInTargetExecutionAccess = 'arn:aws:iam::aws:policy/service-role/CloudWatchEventsBuiltInTargetExecutionAccess';
    const AmazonCloudDirectoryReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonCloudDirectoryReadOnlyAccess';
    const AWSOpsWorksFullAccess = 'arn:aws:iam::aws:policy/AWSOpsWorksFullAccess';
    const AWSOpsWorksCMInstanceProfileRole = 'arn:aws:iam::aws:policy/AWSOpsWorksCMInstanceProfileRole';
    const AWSCodePipelineApproverAccess = 'arn:aws:iam::aws:policy/AWSCodePipelineApproverAccess';
    const AWSApplicationDiscoveryAgentAccess = 'arn:aws:iam::aws:policy/AWSApplicationDiscoveryAgentAccess';
    const ViewOnlyAccess = 'arn:aws:iam::aws:policy/job-function/ViewOnlyAccess';
    const AmazonElasticMapReduceRole = 'arn:aws:iam::aws:policy/service-role/AmazonElasticMapReduceRole';
    const AmazonRoute53DomainsReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonRoute53DomainsReadOnlyAccess';
    const AWSOpsWorksRole = 'arn:aws:iam::aws:policy/service-role/AWSOpsWorksRole';
    const ApplicationAutoScalingForAmazonAppStreamAccess = 'arn:aws:iam::aws:policy/service-role/ApplicationAutoScalingForAmazonAppStreamAccess';
    const AmazonEC2ContainerRegistryFullAccess = 'arn:aws:iam::aws:policy/AmazonEC2ContainerRegistryFullAccess';
    const SimpleWorkflowFullAccess = 'arn:aws:iam::aws:policy/SimpleWorkflowFullAccess';
    const AmazonS3FullAccess = 'arn:aws:iam::aws:policy/AmazonS3FullAccess';
    const AWSStorageGatewayReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSStorageGatewayReadOnlyAccess';
    const Billing = 'arn:aws:iam::aws:policy/job-function/Billing';
    const QuickSightAccessForS3StorageManagementAnalyticsReadOnly = 'arn:aws:iam::aws:policy/service-role/QuickSightAccessForS3StorageManagementAnalyticsReadOnly';
    const AmazonEC2ContainerRegistryReadOnly = 'arn:aws:iam::aws:policy/AmazonEC2ContainerRegistryReadOnly';
    const AmazonElasticMapReduceforEC2Role = 'arn:aws:iam::aws:policy/service-role/AmazonElasticMapReduceforEC2Role';
    const DatabaseAdministrator = 'arn:aws:iam::aws:policy/job-function/DatabaseAdministrator';
    const AmazonRedshiftReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonRedshiftReadOnlyAccess';
    const AmazonEC2ReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonEC2ReadOnlyAccess';
    const AWSXrayReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSXrayReadOnlyAccess';
    const AWSElasticBeanstalkEnhancedHealth = 'arn:aws:iam::aws:policy/service-role/AWSElasticBeanstalkEnhancedHealth';
    const AmazonElasticMapReduceReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonElasticMapReduceReadOnlyAccess';
    const AWSDirectoryServiceReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSDirectoryServiceReadOnlyAccess';
    const AmazonVPCReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonVPCReadOnlyAccess';
    const CloudWatchEventsReadOnlyAccess = 'arn:aws:iam::aws:policy/CloudWatchEventsReadOnlyAccess';
    const AmazonAPIGatewayInvokeFullAccess = 'arn:aws:iam::aws:policy/AmazonAPIGatewayInvokeFullAccess';
    const AmazonKinesisAnalyticsReadOnly = 'arn:aws:iam::aws:policy/AmazonKinesisAnalyticsReadOnly';
    const AmazonMobileAnalyticsFullAccess = 'arn:aws:iam::aws:policy/AmazonMobileAnalyticsFullAccess';
    const AWSMobileHub_FullAccess = 'arn:aws:iam::aws:policy/AWSMobileHub_FullAccess';
    const AmazonAPIGatewayPushToCloudWatchLogs = 'arn:aws:iam::aws:policy/service-role/AmazonAPIGatewayPushToCloudWatchLogs';
    const AWSDataPipelineRole = 'arn:aws:iam::aws:policy/service-role/AWSDataPipelineRole';
    const CloudWatchFullAccess = 'arn:aws:iam::aws:policy/CloudWatchFullAccess';
    const ServiceCatalogAdminFullAccess = 'arn:aws:iam::aws:policy/ServiceCatalogAdminFullAccess';
    const AmazonRDSDirectoryServiceAccess = 'arn:aws:iam::aws:policy/service-role/AmazonRDSDirectoryServiceAccess';
    const AWSCodePipelineReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSCodePipelineReadOnlyAccess';
    const ReadOnlyAccess = 'arn:aws:iam::aws:policy/ReadOnlyAccess';
    const AmazonMachineLearningBatchPredictionsAccess = 'arn:aws:iam::aws:policy/AmazonMachineLearningBatchPredictionsAccess';
    const AmazonRekognitionReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonRekognitionReadOnlyAccess';
    const AWSCodeDeployReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSCodeDeployReadOnlyAccess';
    const CloudSearchFullAccess = 'arn:aws:iam::aws:policy/CloudSearchFullAccess';
    const AWSCloudHSMFullAccess = 'arn:aws:iam::aws:policy/AWSCloudHSMFullAccess';
    const AmazonEC2SpotFleetAutoscaleRole = 'arn:aws:iam::aws:policy/service-role/AmazonEC2SpotFleetAutoscaleRole';
    const AWSCodeBuildDeveloperAccess = 'arn:aws:iam::aws:policy/AWSCodeBuildDeveloperAccess';
    const AmazonEC2SpotFleetRole = 'arn:aws:iam::aws:policy/service-role/AmazonEC2SpotFleetRole';
    const AWSDataPipeline_PowerUser = 'arn:aws:iam::aws:policy/AWSDataPipeline_PowerUser';
    const AmazonElasticTranscoderJobsSubmitter = 'arn:aws:iam::aws:policy/AmazonElasticTranscoderJobsSubmitter';
    const AWSCodeStarServiceRole = 'arn:aws:iam::aws:policy/service-role/AWSCodeStarServiceRole';
    const AWSDirectoryServiceFullAccess = 'arn:aws:iam::aws:policy/AWSDirectoryServiceFullAccess';
    const AmazonDynamoDBFullAccess = 'arn:aws:iam::aws:policy/AmazonDynamoDBFullAccess';
    const AmazonSESReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonSESReadOnlyAccess';
    const AWSWAFReadOnlyAccess = 'arn:aws:iam::aws:policy/AWSWAFReadOnlyAccess';
    const AutoScalingNotificationAccessRole = 'arn:aws:iam::aws:policy/service-role/AutoScalingNotificationAccessRole';
    const AmazonMechanicalTurkReadOnly = 'arn:aws:iam::aws:policy/AmazonMechanicalTurkReadOnly';
    const AmazonKinesisReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonKinesisReadOnlyAccess';
    const AWSCodeDeployFullAccess = 'arn:aws:iam::aws:policy/AWSCodeDeployFullAccess';
    const CloudWatchActionsEC2Access = 'arn:aws:iam::aws:policy/CloudWatchActionsEC2Access';
    const AWSLambdaDynamoDBExecutionRole = 'arn:aws:iam::aws:policy/service-role/AWSLambdaDynamoDBExecutionRole';
    const AmazonRoute53DomainsFullAccess = 'arn:aws:iam::aws:policy/AmazonRoute53DomainsFullAccess';
    const AmazonRoute53FullAccess = 'arn:aws:iam::aws:policy/AmazonRoute53FullAccess';
    const AmazonElastiCacheReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonElastiCacheReadOnlyAccess';
    const AmazonAthenaFullAccess = 'arn:aws:iam::aws:policy/AmazonAthenaFullAccess';
    const AmazonElasticFileSystemReadOnlyAccess = 'arn:aws:iam::aws:policy/AmazonElasticFileSystemReadOnlyAccess';
    const CloudFrontFullAccess = 'arn:aws:iam::aws:policy/CloudFrontFullAccess';
    const AmazonMachineLearningRoleforRedshiftDataSource = 'arn:aws:iam::aws:policy/service-role/AmazonMachineLearningRoleforRedshiftDataSource';
    const AmazonMobileAnalyticsNonFinancialReportAccess = 'arn:aws:iam::aws:policy/AmazonMobileAnalyticsNon-financialReportAccess';
    const AWSCloudTrailFullAccess = 'arn:aws:iam::aws:policy/AWSCloudTrailFullAccess';
    const AmazonCognitoDeveloperAuthenticatedIdentities = 'arn:aws:iam::aws:policy/AmazonCognitoDeveloperAuthenticatedIdentities';
    const AWSConfigRole = 'arn:aws:iam::aws:policy/service-role/AWSConfigRole';
    const AdministratorAccess = 'arn:aws:iam::aws:policy/AdministratorAccess';
}
