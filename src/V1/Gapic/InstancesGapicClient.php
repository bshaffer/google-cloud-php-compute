<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/compute/v1/compute.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Compute\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Compute\V1\AccessConfig;
use Google\Cloud\Compute\V1\AddAccessConfigInstanceRequest;
use Google\Cloud\Compute\V1\AddResourcePoliciesInstanceRequest;
use Google\Cloud\Compute\V1\AggregatedListInstancesRequest;
use Google\Cloud\Compute\V1\AttachDiskInstanceRequest;
use Google\Cloud\Compute\V1\AttachedDisk;
use Google\Cloud\Compute\V1\DeleteAccessConfigInstanceRequest;
use Google\Cloud\Compute\V1\DeleteInstanceRequest;
use Google\Cloud\Compute\V1\DetachDiskInstanceRequest;
use Google\Cloud\Compute\V1\DisplayDevice;
use Google\Cloud\Compute\V1\GetGuestAttributesInstanceRequest;
use Google\Cloud\Compute\V1\GetIamPolicyInstanceRequest;
use Google\Cloud\Compute\V1\GetInstanceRequest;
use Google\Cloud\Compute\V1\GetScreenshotInstanceRequest;
use Google\Cloud\Compute\V1\GetSerialPortOutputInstanceRequest;
use Google\Cloud\Compute\V1\GetShieldedInstanceIdentityInstanceRequest;
use Google\Cloud\Compute\V1\GuestAttributes;
use Google\Cloud\Compute\V1\InsertInstanceRequest;
use Google\Cloud\Compute\V1\Instance;
use Google\Cloud\Compute\V1\InstanceAggregatedList;
use Google\Cloud\Compute\V1\InstanceList;
use Google\Cloud\Compute\V1\InstanceListReferrers;
use Google\Cloud\Compute\V1\InstancesAddResourcePoliciesRequest;
use Google\Cloud\Compute\V1\InstancesRemoveResourcePoliciesRequest;
use Google\Cloud\Compute\V1\InstancesSetLabelsRequest;
use Google\Cloud\Compute\V1\InstancesSetMachineResourcesRequest;
use Google\Cloud\Compute\V1\InstancesSetMachineTypeRequest;
use Google\Cloud\Compute\V1\InstancesSetMinCpuPlatformRequest;
use Google\Cloud\Compute\V1\InstancesSetServiceAccountRequest;
use Google\Cloud\Compute\V1\InstancesStartWithEncryptionKeyRequest;
use Google\Cloud\Compute\V1\ListInstancesRequest;
use Google\Cloud\Compute\V1\ListReferrersInstancesRequest;
use Google\Cloud\Compute\V1\Metadata;
use Google\Cloud\Compute\V1\NetworkInterface;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\Policy;
use Google\Cloud\Compute\V1\RemoveResourcePoliciesInstanceRequest;
use Google\Cloud\Compute\V1\ResetInstanceRequest;
use Google\Cloud\Compute\V1\Scheduling;
use Google\Cloud\Compute\V1\Screenshot;
use Google\Cloud\Compute\V1\SerialPortOutput;
use Google\Cloud\Compute\V1\SetDeletionProtectionInstanceRequest;
use Google\Cloud\Compute\V1\SetDiskAutoDeleteInstanceRequest;
use Google\Cloud\Compute\V1\SetIamPolicyInstanceRequest;
use Google\Cloud\Compute\V1\SetLabelsInstanceRequest;
use Google\Cloud\Compute\V1\SetMachineResourcesInstanceRequest;
use Google\Cloud\Compute\V1\SetMachineTypeInstanceRequest;
use Google\Cloud\Compute\V1\SetMetadataInstanceRequest;
use Google\Cloud\Compute\V1\SetMinCpuPlatformInstanceRequest;
use Google\Cloud\Compute\V1\SetSchedulingInstanceRequest;
use Google\Cloud\Compute\V1\SetServiceAccountInstanceRequest;
use Google\Cloud\Compute\V1\SetShieldedInstanceIntegrityPolicyInstanceRequest;
use Google\Cloud\Compute\V1\SetTagsInstanceRequest;
use Google\Cloud\Compute\V1\ShieldedInstanceConfig;
use Google\Cloud\Compute\V1\ShieldedInstanceIdentity;
use Google\Cloud\Compute\V1\ShieldedInstanceIntegrityPolicy;
use Google\Cloud\Compute\V1\SimulateMaintenanceEventInstanceRequest;
use Google\Cloud\Compute\V1\StartInstanceRequest;
use Google\Cloud\Compute\V1\StartWithEncryptionKeyInstanceRequest;
use Google\Cloud\Compute\V1\StopInstanceRequest;
use Google\Cloud\Compute\V1\Tags;
use Google\Cloud\Compute\V1\TestIamPermissionsInstanceRequest;
use Google\Cloud\Compute\V1\TestPermissionsRequest;
use Google\Cloud\Compute\V1\TestPermissionsResponse;
use Google\Cloud\Compute\V1\UpdateAccessConfigInstanceRequest;
use Google\Cloud\Compute\V1\UpdateDisplayDeviceInstanceRequest;
use Google\Cloud\Compute\V1\UpdateInstanceRequest;
use Google\Cloud\Compute\V1\UpdateNetworkInterfaceInstanceRequest;
use Google\Cloud\Compute\V1\UpdateShieldedInstanceConfigInstanceRequest;
use Google\Cloud\Compute\V1\ZoneSetPolicyRequest;

/**
 * Service Description: The Instances API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $instancesClient = new InstancesClient();
 * try {
 *     $accessConfigResource = new AccessConfig();
 *     $instance = '';
 *     $networkInterface = '';
 *     $project = '';
 *     $zone = '';
 *     $response = $instancesClient->addAccessConfig($accessConfigResource, $instance, $networkInterface, $project, $zone);
 * } finally {
 *     $instancesClient->close();
 * }
 * ```
 *
 * @experimental
 */
class InstancesGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.Instances';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'compute.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/compute',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/instances_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/instances_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/instances_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function defaultTransport()
    {
        return 'rest';
    }

    private static function getSupportedTransports()
    {
        return ['rest'];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'compute.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. At the moment, only supports
     *           `rest`.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\RestTransport::build()} method for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Adds an access config to an instance's network interface.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $accessConfigResource = new AccessConfig();
     *     $instance = '';
     *     $networkInterface = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->addAccessConfig($accessConfigResource, $instance, $networkInterface, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param AccessConfig $accessConfigResource The body resource for this request
     * @param string       $instance             The instance name for this request.
     * @param string       $networkInterface     The name of the network interface to add to this instance.
     * @param string       $project              Project ID for this request.
     * @param string       $zone                 The name of the zone for this request.
     * @param array        $optionalArgs         {
     *                                           Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function addAccessConfig($accessConfigResource, $instance, $networkInterface, $project, $zone, array $optionalArgs = [])
    {
        $request = new AddAccessConfigInstanceRequest();
        $request->setAccessConfigResource($accessConfigResource);
        $request->setInstance($instance);
        $request->setNetworkInterface($networkInterface);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'AddAccessConfig',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Adds existing resource policies to an instance. You can only add one policy right now which will be applied to this instance for scheduling live migrations.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesAddResourcePoliciesRequestResource = new InstancesAddResourcePoliciesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->addResourcePolicies($instance, $instancesAddResourcePoliciesRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                              $instance                                    The instance name for this request.
     * @param InstancesAddResourcePoliciesRequest $instancesAddResourcePoliciesRequestResource The body resource for this request
     * @param string                              $project                                     Project ID for this request.
     * @param string                              $zone                                        The name of the zone for this request.
     * @param array                               $optionalArgs                                {
     *                                                                                         Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function addResourcePolicies($instance, $instancesAddResourcePoliciesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new AddResourcePoliciesInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesAddResourcePoliciesRequestResource($instancesAddResourcePoliciesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'AddResourcePolicies',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Retrieves aggregated list of all of the instances in your project across all regions and zones.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instancesClient->aggregatedList($project);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $key => $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $instancesClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $filter
     *          A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either `=`, `!=`, `>`, or `<`.
     *
     *          For example, if you are filtering Compute Engine instances, you can exclude instances named `example-instance` by specifying `name != example-instance`.
     *
     *          You can also filter nested fields. For example, you could specify `scheduling.automaticRestart = false` to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.
     *
     *          To filter on multiple expressions, provide each separate expression within parentheses. For example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND` expression. However, you can include `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true) ```
     *     @type bool $includeAllScopes
     *          Indicates whether every visible scope for each scope type (zone, region, global) should be included in the response. For new resource types added after this field, the flag has no effect as new resource types will always include every visible scope for each scope type in response. For resource types which predate this field, if this flag is omitted or false, only scopes of the scope types where the resource type is expected to be found will be included.
     *     @type int $maxResults
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.
     *
     *          You can also sort results in descending order based on the creation timestamp using `orderBy="creationTimestamp desc"`. This sorts results based on the `creationTimestamp` field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.
     *
     *          Currently, only sorting by `name` or `creationTimestamp desc` is supported.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type bool $returnPartialSuccess
     *          Opt-in for partial success behavior which provides partial results in case of failure. The default value is false and the logic is the same as today.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function aggregatedList($project, array $optionalArgs = [])
    {
        $request = new AggregatedListInstancesRequest();
        $request->setProject($project);
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['includeAllScopes'])) {
            $request->setIncludeAllScopes($optionalArgs['includeAllScopes']);
        }
        if (isset($optionalArgs['maxResults'])) {
            $request->setMaxResults($optionalArgs['maxResults']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['returnPartialSuccess'])) {
            $request->setReturnPartialSuccess($optionalArgs['returnPartialSuccess']);
        }

        return $this->getPagedListResponse(
            'AggregatedList',
            $optionalArgs,
            InstanceAggregatedList::class,
            $request
        );
    }

    /**
     * Attaches an existing Disk resource to an instance. You must first create the disk before you can attach it. It is not possible to create and attach a disk at the same time. For more information, read Adding a persistent disk to your instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $attachedDiskResource = new AttachedDisk();
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->attachDisk($attachedDiskResource, $instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param AttachedDisk $attachedDiskResource The body resource for this request
     * @param string       $instance             The instance name for this request.
     * @param string       $project              Project ID for this request.
     * @param string       $zone                 The name of the zone for this request.
     * @param array        $optionalArgs         {
     *                                           Optional.
     *
     *     @type bool $forceAttach
     *          Whether to force attach the regional disk even if it's currently attached to another instance. If you try to force attach a zonal disk to an instance, you will receive an error.
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function attachDisk($attachedDiskResource, $instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new AttachDiskInstanceRequest();
        $request->setAttachedDiskResource($attachedDiskResource);
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['forceAttach'])) {
            $request->setForceAttach($optionalArgs['forceAttach']);
        }
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'AttachDisk',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes the specified Instance resource. For more information, see Stopping or Deleting an Instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->delete($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance resource to delete.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function delete($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Delete',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes an access config from an instance's network interface.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $accessConfig = '';
     *     $instance = '';
     *     $networkInterface = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->deleteAccessConfig($accessConfig, $instance, $networkInterface, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $accessConfig     The name of the access config to delete.
     * @param string $instance         The instance name for this request.
     * @param string $networkInterface The name of the network interface.
     * @param string $project          Project ID for this request.
     * @param string $zone             The name of the zone for this request.
     * @param array  $optionalArgs     {
     *                                 Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteAccessConfig($accessConfig, $instance, $networkInterface, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteAccessConfigInstanceRequest();
        $request->setAccessConfig($accessConfig);
        $request->setInstance($instance);
        $request->setNetworkInterface($networkInterface);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DeleteAccessConfig',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Detaches a disk from an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $deviceName = '';
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->detachDisk($deviceName, $instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $deviceName   The device name of the disk to detach. Make a get() request on the instance to view currently attached disks and device names.
     * @param string $instance     Instance name for this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function detachDisk($deviceName, $instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new DetachDiskInstanceRequest();
        $request->setDeviceName($deviceName);
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DetachDisk',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the specified Instance resource. Gets a list of available instances by making a list() request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->get($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance resource to return.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Instance
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'Get',
            Instance::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the specified guest attributes entry.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->getGuestAttributes($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $queryPath
     *          Specifies the guest attributes path to be queried.
     *     @type string $variableKey
     *          Specifies the key for the guest attributes entry.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\GuestAttributes
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getGuestAttributes($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetGuestAttributesInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['queryPath'])) {
            $request->setQueryPath($optionalArgs['queryPath']);
        }
        if (isset($optionalArgs['variableKey'])) {
            $request->setVariableKey($optionalArgs['variableKey']);
        }

        return $this->startCall(
            'GetGuestAttributes',
            GuestAttributes::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the access control policy for a resource. May be empty if no such policy or resource exists.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $zone = '';
     *     $response = $instancesClient->getIamPolicy($project, $resource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $resource     Name or id of the resource for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $optionsRequestedPolicyVersion
     *          Requested IAM Policy version.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getIamPolicy($project, $resource, $zone, array $optionalArgs = [])
    {
        $request = new GetIamPolicyInstanceRequest();
        $request->setProject($project);
        $request->setResource($resource);
        $request->setZone($zone);
        if (isset($optionalArgs['optionsRequestedPolicyVersion'])) {
            $request->setOptionsRequestedPolicyVersion($optionalArgs['optionsRequestedPolicyVersion']);
        }

        return $this->startCall(
            'GetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the screenshot from the specified instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->getScreenshot($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Screenshot
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getScreenshot($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetScreenshotInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'GetScreenshot',
            Screenshot::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the last 1 MB of serial port output from the specified instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->getSerialPortOutput($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance for this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $port
     *          Specifies which COM or serial port to retrieve data from.
     *     @type string $start
     *          Specifies the starting byte position of the output to return. To start with the first byte of output to the specified port, omit this field or set it to `0`.
     *
     *          If the output for that byte position is available, this field matches the `start` parameter sent with the request. If the amount of serial console output exceeds the size of the buffer (1 MB), the oldest output is discarded and is no longer available. If the requested start position refers to discarded output, the start position is adjusted to the oldest output still available, and the adjusted start position is returned as the `start` property value.
     *
     *          You can also provide a negative start position, which translates to the most recent number of bytes written to the serial port. For example, -3 is interpreted as the most recent 3 bytes written to the serial console.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\SerialPortOutput
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getSerialPortOutput($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetSerialPortOutputInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['port'])) {
            $request->setPort($optionalArgs['port']);
        }
        if (isset($optionalArgs['start'])) {
            $request->setStart($optionalArgs['start']);
        }

        return $this->startCall(
            'GetSerialPortOutput',
            SerialPortOutput::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the Shielded Instance Identity of an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->getShieldedInstanceIdentity($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name or id of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\ShieldedInstanceIdentity
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getShieldedInstanceIdentity($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetShieldedInstanceIdentityInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'GetShieldedInstanceIdentity',
            ShieldedInstanceIdentity::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates an instance resource in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instanceResource = new Instance();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->insert($instanceResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param Instance $instanceResource The body resource for this request
     * @param string   $project          Project ID for this request.
     * @param string   $zone             The name of the zone for this request.
     * @param array    $optionalArgs     {
     *                                   Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type string $sourceInstanceTemplate
     *          Specifies instance template to create the instance.
     *
     *          This field is optional. It can be a full or partial URL. For example, the following are all valid URLs to an instance template:
     *          - https://www.googleapis.com/compute/v1/projects/project/global/instanceTemplates/instanceTemplate
     *          - projects/project/global/instanceTemplates/instanceTemplate
     *          - global/instanceTemplates/instanceTemplate
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function insert($instanceResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new InsertInstanceRequest();
        $request->setInstanceResource($instanceResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }
        if (isset($optionalArgs['sourceInstanceTemplate'])) {
            $request->setSourceInstanceTemplate($optionalArgs['sourceInstanceTemplate']);
        }

        return $this->startCall(
            'Insert',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Retrieves the list of instances contained within the specified zone.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instancesClient->list_($project, $zone);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $instancesClient->list_($project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $filter
     *          A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either `=`, `!=`, `>`, or `<`.
     *
     *          For example, if you are filtering Compute Engine instances, you can exclude instances named `example-instance` by specifying `name != example-instance`.
     *
     *          You can also filter nested fields. For example, you could specify `scheduling.automaticRestart = false` to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.
     *
     *          To filter on multiple expressions, provide each separate expression within parentheses. For example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND` expression. However, you can include `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true) ```
     *     @type int $maxResults
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.
     *
     *          You can also sort results in descending order based on the creation timestamp using `orderBy="creationTimestamp desc"`. This sorts results based on the `creationTimestamp` field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.
     *
     *          Currently, only sorting by `name` or `creationTimestamp desc` is supported.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type bool $returnPartialSuccess
     *          Opt-in for partial success behavior which provides partial results in case of failure. The default value is false and the logic is the same as today.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function list_($project, $zone, array $optionalArgs = [])
    {
        $request = new ListInstancesRequest();
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['maxResults'])) {
            $request->setMaxResults($optionalArgs['maxResults']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['returnPartialSuccess'])) {
            $request->setReturnPartialSuccess($optionalArgs['returnPartialSuccess']);
        }

        return $this->getPagedListResponse(
            'List',
            $optionalArgs,
            InstanceList::class,
            $request
        );
    }

    /**
     * Retrieves a list of resources that refer to the VM instance specified in the request. For example, if the VM instance is part of a managed or unmanaged instance group, the referrers list includes the instance group. For more information, read Viewing referrers to VM instances.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instancesClient->listReferrers($instance, $project, $zone);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $instancesClient->listReferrers($instance, $project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the target instance scoping this request, or '-' if the request should span over all instances in the container.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $filter
     *          A filter expression that filters resources listed in the response. The expression must specify the field name, a comparison operator, and the value that you want to use for filtering. The value must be a string, a number, or a boolean. The comparison operator must be either `=`, `!=`, `>`, or `<`.
     *
     *          For example, if you are filtering Compute Engine instances, you can exclude instances named `example-instance` by specifying `name != example-instance`.
     *
     *          You can also filter nested fields. For example, you could specify `scheduling.automaticRestart = false` to include instances only if they are not scheduled for automatic restarts. You can use filtering on nested fields to filter based on resource labels.
     *
     *          To filter on multiple expressions, provide each separate expression within parentheses. For example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND` expression. However, you can include `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND (scheduling.automaticRestart = true) ```
     *     @type int $maxResults
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Sorts list results by a certain order. By default, results are returned in alphanumerical order based on the resource name.
     *
     *          You can also sort results in descending order based on the creation timestamp using `orderBy="creationTimestamp desc"`. This sorts results based on the `creationTimestamp` field in reverse chronological order (newest result first). Use this to sort resources like operations so that the newest operation is returned first.
     *
     *          Currently, only sorting by `name` or `creationTimestamp desc` is supported.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type bool $returnPartialSuccess
     *          Opt-in for partial success behavior which provides partial results in case of failure. The default value is false and the logic is the same as today.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listReferrers($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new ListReferrersInstancesRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['maxResults'])) {
            $request->setMaxResults($optionalArgs['maxResults']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['returnPartialSuccess'])) {
            $request->setReturnPartialSuccess($optionalArgs['returnPartialSuccess']);
        }

        return $this->getPagedListResponse(
            'ListReferrers',
            $optionalArgs,
            InstanceListReferrers::class,
            $request
        );
    }

    /**
     * Removes resource policies from an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesRemoveResourcePoliciesRequestResource = new InstancesRemoveResourcePoliciesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->removeResourcePolicies($instance, $instancesRemoveResourcePoliciesRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                                 $instance                                       The instance name for this request.
     * @param InstancesRemoveResourcePoliciesRequest $instancesRemoveResourcePoliciesRequestResource The body resource for this request
     * @param string                                 $project                                        Project ID for this request.
     * @param string                                 $zone                                           The name of the zone for this request.
     * @param array                                  $optionalArgs                                   {
     *                                                                                               Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function removeResourcePolicies($instance, $instancesRemoveResourcePoliciesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new RemoveResourcePoliciesInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesRemoveResourcePoliciesRequestResource($instancesRemoveResourcePoliciesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'RemoveResourcePolicies',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Performs a reset on the instance. This is a hard reset the VM does not do a graceful shutdown. For more information, see Resetting an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->reset($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function reset($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new ResetInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Reset',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets deletion protection on the instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $zone = '';
     *     $response = $instancesClient->setDeletionProtection($project, $resource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $resource     Name or id of the resource for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type bool $deletionProtection
     *          Whether the resource should be protected against deletion.
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setDeletionProtection($project, $resource, $zone, array $optionalArgs = [])
    {
        $request = new SetDeletionProtectionInstanceRequest();
        $request->setProject($project);
        $request->setResource($resource);
        $request->setZone($zone);
        if (isset($optionalArgs['deletionProtection'])) {
            $request->setDeletionProtection($optionalArgs['deletionProtection']);
        }
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetDeletionProtection',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the auto-delete flag for a disk attached to an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $autoDelete = false;
     *     $deviceName = '';
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setDiskAutoDelete($autoDelete, $deviceName, $instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param bool   $autoDelete   Whether to auto-delete the disk when the instance is deleted.
     * @param string $deviceName   The device name of the disk to modify. Make a get() request on the instance to view currently attached disks and device names.
     * @param string $instance     The instance name for this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setDiskAutoDelete($autoDelete, $deviceName, $instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetDiskAutoDeleteInstanceRequest();
        $request->setAutoDelete($autoDelete);
        $request->setDeviceName($deviceName);
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetDiskAutoDelete',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the access control policy on the specified resource. Replaces any existing policy.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $zone = '';
     *     $zoneSetPolicyRequestResource = new ZoneSetPolicyRequest();
     *     $response = $instancesClient->setIamPolicy($project, $resource, $zone, $zoneSetPolicyRequestResource);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string               $project                      Project ID for this request.
     * @param string               $resource                     Name or id of the resource for this request.
     * @param string               $zone                         The name of the zone for this request.
     * @param ZoneSetPolicyRequest $zoneSetPolicyRequestResource The body resource for this request
     * @param array                $optionalArgs                 {
     *                                                           Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setIamPolicy($project, $resource, $zone, $zoneSetPolicyRequestResource, array $optionalArgs = [])
    {
        $request = new SetIamPolicyInstanceRequest();
        $request->setProject($project);
        $request->setResource($resource);
        $request->setZone($zone);
        $request->setZoneSetPolicyRequestResource($zoneSetPolicyRequestResource);

        return $this->startCall(
            'SetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets labels on an instance. To learn more about labels, read the Labeling Resources documentation.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesSetLabelsRequestResource = new InstancesSetLabelsRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setLabels($instance, $instancesSetLabelsRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                    $instance                          Name of the instance scoping this request.
     * @param InstancesSetLabelsRequest $instancesSetLabelsRequestResource The body resource for this request
     * @param string                    $project                           Project ID for this request.
     * @param string                    $zone                              The name of the zone for this request.
     * @param array                     $optionalArgs                      {
     *                                                                     Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setLabels($instance, $instancesSetLabelsRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetLabelsInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesSetLabelsRequestResource($instancesSetLabelsRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetLabels',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the number and/or type of accelerator for a stopped instance to the values specified in the request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesSetMachineResourcesRequestResource = new InstancesSetMachineResourcesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setMachineResources($instance, $instancesSetMachineResourcesRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                              $instance                                    Name of the instance scoping this request.
     * @param InstancesSetMachineResourcesRequest $instancesSetMachineResourcesRequestResource The body resource for this request
     * @param string                              $project                                     Project ID for this request.
     * @param string                              $zone                                        The name of the zone for this request.
     * @param array                               $optionalArgs                                {
     *                                                                                         Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setMachineResources($instance, $instancesSetMachineResourcesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetMachineResourcesInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesSetMachineResourcesRequestResource($instancesSetMachineResourcesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetMachineResources',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the machine type for a stopped instance to the machine type specified in the request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesSetMachineTypeRequestResource = new InstancesSetMachineTypeRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setMachineType($instance, $instancesSetMachineTypeRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                         $instance                               Name of the instance scoping this request.
     * @param InstancesSetMachineTypeRequest $instancesSetMachineTypeRequestResource The body resource for this request
     * @param string                         $project                                Project ID for this request.
     * @param string                         $zone                                   The name of the zone for this request.
     * @param array                          $optionalArgs                           {
     *                                                                               Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setMachineType($instance, $instancesSetMachineTypeRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetMachineTypeInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesSetMachineTypeRequestResource($instancesSetMachineTypeRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetMachineType',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets metadata for the specified instance to the data included in the request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $metadataResource = new Metadata();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setMetadata($instance, $metadataResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string   $instance         Name of the instance scoping this request.
     * @param Metadata $metadataResource The body resource for this request
     * @param string   $project          Project ID for this request.
     * @param string   $zone             The name of the zone for this request.
     * @param array    $optionalArgs     {
     *                                   Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setMetadata($instance, $metadataResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetMetadataInstanceRequest();
        $request->setInstance($instance);
        $request->setMetadataResource($metadataResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetMetadata',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the minimum CPU platform that this instance should use. This method can only be called on a stopped instance. For more information, read Specifying a Minimum CPU Platform.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesSetMinCpuPlatformRequestResource = new InstancesSetMinCpuPlatformRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setMinCpuPlatform($instance, $instancesSetMinCpuPlatformRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                            $instance                                  Name of the instance scoping this request.
     * @param InstancesSetMinCpuPlatformRequest $instancesSetMinCpuPlatformRequestResource The body resource for this request
     * @param string                            $project                                   Project ID for this request.
     * @param string                            $zone                                      The name of the zone for this request.
     * @param array                             $optionalArgs                              {
     *                                                                                     Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setMinCpuPlatform($instance, $instancesSetMinCpuPlatformRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetMinCpuPlatformInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesSetMinCpuPlatformRequestResource($instancesSetMinCpuPlatformRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetMinCpuPlatform',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets an instance's scheduling options. You can only call this method on a stopped instance, that is, a VM instance that is in a `TERMINATED` state. See Instance Life Cycle for more information on the possible instance states.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $schedulingResource = new Scheduling();
     *     $zone = '';
     *     $response = $instancesClient->setScheduling($instance, $project, $schedulingResource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string     $instance           Instance name for this request.
     * @param string     $project            Project ID for this request.
     * @param Scheduling $schedulingResource The body resource for this request
     * @param string     $zone               The name of the zone for this request.
     * @param array      $optionalArgs       {
     *                                       Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setScheduling($instance, $project, $schedulingResource, $zone, array $optionalArgs = [])
    {
        $request = new SetSchedulingInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setSchedulingResource($schedulingResource);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetScheduling',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the service account on the instance. For more information, read Changing the service account and access scopes for an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesSetServiceAccountRequestResource = new InstancesSetServiceAccountRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->setServiceAccount($instance, $instancesSetServiceAccountRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                            $instance                                  Name of the instance resource to start.
     * @param InstancesSetServiceAccountRequest $instancesSetServiceAccountRequestResource The body resource for this request
     * @param string                            $project                                   Project ID for this request.
     * @param string                            $zone                                      The name of the zone for this request.
     * @param array                             $optionalArgs                              {
     *                                                                                     Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setServiceAccount($instance, $instancesSetServiceAccountRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetServiceAccountInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesSetServiceAccountRequestResource($instancesSetServiceAccountRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetServiceAccount',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the Shielded Instance integrity policy for an instance. You can only use this method on a running instance. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $shieldedInstanceIntegrityPolicyResource = new ShieldedInstanceIntegrityPolicy();
     *     $zone = '';
     *     $response = $instancesClient->setShieldedInstanceIntegrityPolicy($instance, $project, $shieldedInstanceIntegrityPolicyResource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                          $instance                                Name or id of the instance scoping this request.
     * @param string                          $project                                 Project ID for this request.
     * @param ShieldedInstanceIntegrityPolicy $shieldedInstanceIntegrityPolicyResource The body resource for this request
     * @param string                          $zone                                    The name of the zone for this request.
     * @param array                           $optionalArgs                            {
     *                                                                                 Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setShieldedInstanceIntegrityPolicy($instance, $project, $shieldedInstanceIntegrityPolicyResource, $zone, array $optionalArgs = [])
    {
        $request = new SetShieldedInstanceIntegrityPolicyInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setShieldedInstanceIntegrityPolicyResource($shieldedInstanceIntegrityPolicyResource);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetShieldedInstanceIntegrityPolicy',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets network tags for the specified instance to the data included in the request.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $tagsResource = new Tags();
     *     $zone = '';
     *     $response = $instancesClient->setTags($instance, $project, $tagsResource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param Tags   $tagsResource The body resource for this request
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setTags($instance, $project, $tagsResource, $zone, array $optionalArgs = [])
    {
        $request = new SetTagsInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setTagsResource($tagsResource);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetTags',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Simulates a maintenance event on the instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->simulateMaintenanceEvent($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance scoping this request.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function simulateMaintenanceEvent($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new SimulateMaintenanceEventInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'SimulateMaintenanceEvent',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Starts an instance that was stopped using the instances().stop method. For more information, see Restart an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->start($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance resource to start.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function start($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new StartInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Start',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Starts an instance that was stopped using the instances().stop method. For more information, see Restart an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instancesStartWithEncryptionKeyRequestResource = new InstancesStartWithEncryptionKeyRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->startWithEncryptionKey($instance, $instancesStartWithEncryptionKeyRequestResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                                 $instance                                       Name of the instance resource to start.
     * @param InstancesStartWithEncryptionKeyRequest $instancesStartWithEncryptionKeyRequestResource The body resource for this request
     * @param string                                 $project                                        Project ID for this request.
     * @param string                                 $zone                                           The name of the zone for this request.
     * @param array                                  $optionalArgs                                   {
     *                                                                                               Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function startWithEncryptionKey($instance, $instancesStartWithEncryptionKeyRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new StartWithEncryptionKeyInstanceRequest();
        $request->setInstance($instance);
        $request->setInstancesStartWithEncryptionKeyRequestResource($instancesStartWithEncryptionKeyRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'StartWithEncryptionKey',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Stops a running instance, shutting it down cleanly, and allows you to restart the instance at a later time. Stopped instances do not incur VM usage charges while they are stopped. However, resources that the VM is using, such as persistent disks and static IP addresses, will continue to be charged until they are deleted. For more information, see Stopping an instance.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->stop($instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string $instance     Name of the instance resource to stop.
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function stop($instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new StopInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Stop',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns permissions that a caller has on the specified resource.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $testPermissionsRequestResource = new TestPermissionsRequest();
     *     $zone = '';
     *     $response = $instancesClient->testIamPermissions($project, $resource, $testPermissionsRequestResource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                 $project                        Project ID for this request.
     * @param string                 $resource                       Name or id of the resource for this request.
     * @param TestPermissionsRequest $testPermissionsRequestResource The body resource for this request
     * @param string                 $zone                           The name of the zone for this request.
     * @param array                  $optionalArgs                   {
     *                                                               Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\TestPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function testIamPermissions($project, $resource, $testPermissionsRequestResource, $zone, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsInstanceRequest();
        $request->setProject($project);
        $request->setResource($resource);
        $request->setTestPermissionsRequestResource($testPermissionsRequestResource);
        $request->setZone($zone);

        return $this->startCall(
            'TestIamPermissions',
            TestPermissionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates an instance only if the necessary resources are available. This method can update only a specific set of instance properties. See  Updating a running instance for a list of updatable instance properties.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $instanceResource = new Instance();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->update($instance, $instanceResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string   $instance         Name of the instance resource to update.
     * @param Instance $instanceResource The body resource for this request
     * @param string   $project          Project ID for this request.
     * @param string   $zone             The name of the zone for this request.
     * @param array    $optionalArgs     {
     *                                   Optional.
     *
     *     @type string $minimalAction
     *          Specifies the action to take when updating an instance even if the updated properties do not require it. If not specified, then Compute Engine acts based on the minimum action that the updated properties require.
     *     @type string $mostDisruptiveAllowedAction
     *          Specifies the most disruptive action that can be taken on the instance as part of the update. Compute Engine returns an error if the instance properties require a more disruptive action as part of the instance update. Valid options from lowest to highest are NO_EFFECT, REFRESH, and RESTART.
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function update($instance, $instanceResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new UpdateInstanceRequest();
        $request->setInstance($instance);
        $request->setInstanceResource($instanceResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['minimalAction'])) {
            $request->setMinimalAction($optionalArgs['minimalAction']);
        }
        if (isset($optionalArgs['mostDisruptiveAllowedAction'])) {
            $request->setMostDisruptiveAllowedAction($optionalArgs['mostDisruptiveAllowedAction']);
        }
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Update',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the specified access config from an instance's network interface with the data included in the request. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $accessConfigResource = new AccessConfig();
     *     $instance = '';
     *     $networkInterface = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->updateAccessConfig($accessConfigResource, $instance, $networkInterface, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param AccessConfig $accessConfigResource The body resource for this request
     * @param string       $instance             The instance name for this request.
     * @param string       $networkInterface     The name of the network interface where the access config is attached.
     * @param string       $project              Project ID for this request.
     * @param string       $zone                 The name of the zone for this request.
     * @param array        $optionalArgs         {
     *                                           Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateAccessConfig($accessConfigResource, $instance, $networkInterface, $project, $zone, array $optionalArgs = [])
    {
        $request = new UpdateAccessConfigInstanceRequest();
        $request->setAccessConfigResource($accessConfigResource);
        $request->setInstance($instance);
        $request->setNetworkInterface($networkInterface);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'UpdateAccessConfig',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the Display config for a VM instance. You can only use this method on a stopped VM instance. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $displayDeviceResource = new DisplayDevice();
     *     $instance = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->updateDisplayDevice($displayDeviceResource, $instance, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param DisplayDevice $displayDeviceResource The body resource for this request
     * @param string        $instance              Name of the instance scoping this request.
     * @param string        $project               Project ID for this request.
     * @param string        $zone                  The name of the zone for this request.
     * @param array         $optionalArgs          {
     *                                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateDisplayDevice($displayDeviceResource, $instance, $project, $zone, array $optionalArgs = [])
    {
        $request = new UpdateDisplayDeviceInstanceRequest();
        $request->setDisplayDeviceResource($displayDeviceResource);
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'UpdateDisplayDevice',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates an instance's network interface. This method follows PATCH semantics.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $networkInterface = '';
     *     $networkInterfaceResource = new NetworkInterface();
     *     $project = '';
     *     $zone = '';
     *     $response = $instancesClient->updateNetworkInterface($instance, $networkInterface, $networkInterfaceResource, $project, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string           $instance                 The instance name for this request.
     * @param string           $networkInterface         The name of the network interface to update.
     * @param NetworkInterface $networkInterfaceResource The body resource for this request
     * @param string           $project                  Project ID for this request.
     * @param string           $zone                     The name of the zone for this request.
     * @param array            $optionalArgs             {
     *                                                   Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateNetworkInterface($instance, $networkInterface, $networkInterfaceResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new UpdateNetworkInterfaceInstanceRequest();
        $request->setInstance($instance);
        $request->setNetworkInterface($networkInterface);
        $request->setNetworkInterfaceResource($networkInterfaceResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'UpdateNetworkInterface',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the Shielded Instance config for an instance. You can only use this method on a stopped instance. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $instancesClient = new InstancesClient();
     * try {
     *     $instance = '';
     *     $project = '';
     *     $shieldedInstanceConfigResource = new ShieldedInstanceConfig();
     *     $zone = '';
     *     $response = $instancesClient->updateShieldedInstanceConfig($instance, $project, $shieldedInstanceConfigResource, $zone);
     * } finally {
     *     $instancesClient->close();
     * }
     * ```
     *
     * @param string                 $instance                       Name or id of the instance scoping this request.
     * @param string                 $project                        Project ID for this request.
     * @param ShieldedInstanceConfig $shieldedInstanceConfigResource The body resource for this request
     * @param string                 $zone                           The name of the zone for this request.
     * @param array                  $optionalArgs                   {
     *                                                               Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\Operation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateShieldedInstanceConfig($instance, $project, $shieldedInstanceConfigResource, $zone, array $optionalArgs = [])
    {
        $request = new UpdateShieldedInstanceConfigInstanceRequest();
        $request->setInstance($instance);
        $request->setProject($project);
        $request->setShieldedInstanceConfigResource($shieldedInstanceConfigResource);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'UpdateShieldedInstanceConfig',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
