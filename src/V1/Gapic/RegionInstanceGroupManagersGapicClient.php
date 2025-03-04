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
use Google\Cloud\Compute\V1\AbandonInstancesRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\ApplyUpdatesToInstancesRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\CreateInstancesRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeleteInstancesRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeletePerInstanceConfigsRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeleteRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\GetRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\InsertRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\InstanceGroupManager;
use Google\Cloud\Compute\V1\ListErrorsRegionInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListManagedInstancesRegionInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListPerInstanceConfigsRegionInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListRegionInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\PatchPerInstanceConfigsRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\PatchRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\RecreateInstancesRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagerDeleteInstanceConfigReq;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagerList;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagerPatchInstanceConfigReq;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagerUpdateInstanceConfigReq;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersAbandonInstancesRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersApplyUpdatesRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersCreateInstancesRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersDeleteInstancesRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersListErrorsResponse;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersListInstanceConfigsResp;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersListInstancesResponse;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersRecreateRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersSetTargetPoolsRequest;
use Google\Cloud\Compute\V1\RegionInstanceGroupManagersSetTemplateRequest;
use Google\Cloud\Compute\V1\ResizeRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\SetInstanceTemplateRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\SetTargetPoolsRegionInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\UpdatePerInstanceConfigsRegionInstanceGroupManagerRequest;

/**
 * Service Description: The RegionInstanceGroupManagers API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
 * try {
 *     $instanceGroupManager = '';
 *     $project = '';
 *     $region = '';
 *     $regionInstanceGroupManagersAbandonInstancesRequestResource = new RegionInstanceGroupManagersAbandonInstancesRequest();
 *     $response = $regionInstanceGroupManagersClient->abandonInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersAbandonInstancesRequestResource);
 * } finally {
 *     $regionInstanceGroupManagersClient->close();
 * }
 * ```
 *
 * @experimental
 */
class RegionInstanceGroupManagersGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.RegionInstanceGroupManagers';

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
            'clientConfig' => __DIR__.'/../resources/region_instance_group_managers_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/region_instance_group_managers_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/region_instance_group_managers_rest_client_config.php',
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
     * Flags the specified instances to be immediately removed from the managed instance group. Abandoning an instance does not delete the instance, but it does remove the instance from any target pools that are applied by the managed instance group. This method reduces the targetSize of the managed instance group by the number of instances that you abandon. This operation is marked as DONE when the action is scheduled even if the instances have not yet been removed from the group. You must separately verify the status of the abandoning action with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * You can specify a maximum of 1000 instances with this method per request.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersAbandonInstancesRequestResource = new RegionInstanceGroupManagersAbandonInstancesRequest();
     *     $response = $regionInstanceGroupManagersClient->abandonInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersAbandonInstancesRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                             $instanceGroupManager                                       Name of the managed instance group.
     * @param string                                             $project                                                    Project ID for this request.
     * @param string                                             $region                                                     Name of the region scoping this request.
     * @param RegionInstanceGroupManagersAbandonInstancesRequest $regionInstanceGroupManagersAbandonInstancesRequestResource The body resource for this request
     * @param array                                              $optionalArgs                                               {
     *                                                                                                                       Optional.
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
    public function abandonInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersAbandonInstancesRequestResource, array $optionalArgs = [])
    {
        $request = new AbandonInstancesRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersAbandonInstancesRequestResource($regionInstanceGroupManagersAbandonInstancesRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'AbandonInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Apply updates to selected instances the managed instance group.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersApplyUpdatesRequestResource = new RegionInstanceGroupManagersApplyUpdatesRequest();
     *     $response = $regionInstanceGroupManagersClient->applyUpdatesToInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersApplyUpdatesRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                         $instanceGroupManager                                   The name of the managed instance group, should conform to RFC1035.
     * @param string                                         $project                                                Project ID for this request.
     * @param string                                         $region                                                 Name of the region scoping this request, should conform to RFC1035.
     * @param RegionInstanceGroupManagersApplyUpdatesRequest $regionInstanceGroupManagersApplyUpdatesRequestResource The body resource for this request
     * @param array                                          $optionalArgs                                           {
     *                                                                                                               Optional.
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
    public function applyUpdatesToInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersApplyUpdatesRequestResource, array $optionalArgs = [])
    {
        $request = new ApplyUpdatesToInstancesRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersApplyUpdatesRequestResource($regionInstanceGroupManagersApplyUpdatesRequestResource);

        return $this->startCall(
            'ApplyUpdatesToInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates instances with per-instance configs in this regional managed instance group. Instances are created using the current instance template. The create instances operation is marked DONE if the createInstances request is successful. The underlying actions take additional time. You must separately verify the status of the creating or actions with the listmanagedinstances method.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersCreateInstancesRequestResource = new RegionInstanceGroupManagersCreateInstancesRequest();
     *     $response = $regionInstanceGroupManagersClient->createInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersCreateInstancesRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                            $instanceGroupManager                                      The name of the managed instance group. It should conform to RFC1035.
     * @param string                                            $project                                                   Project ID for this request.
     * @param string                                            $region                                                    The name of the region where the managed instance group is located. It should conform to RFC1035.
     * @param RegionInstanceGroupManagersCreateInstancesRequest $regionInstanceGroupManagersCreateInstancesRequestResource The body resource for this request
     * @param array                                             $optionalArgs                                              {
     *                                                                                                                     Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request.
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
    public function createInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersCreateInstancesRequestResource, array $optionalArgs = [])
    {
        $request = new CreateInstancesRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersCreateInstancesRequestResource($regionInstanceGroupManagersCreateInstancesRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'CreateInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes the specified managed instance group and all of the instances in that group.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $response = $regionInstanceGroupManagersClient->delete($instanceGroupManager, $project, $region);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager Name of the managed instance group to delete.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request.
     * @param array  $optionalArgs         {
     *                                     Optional.
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
    public function delete($instanceGroupManager, $project, $region, array $optionalArgs = [])
    {
        $request = new DeleteRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
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
     * Flags the specified instances in the managed instance group to be immediately deleted. The instances are also removed from any target pools of which they were a member. This method reduces the targetSize of the managed instance group by the number of instances that you delete. The deleteInstances operation is marked DONE if the deleteInstances request is successful. The underlying actions take additional time. You must separately verify the status of the deleting action with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * You can specify a maximum of 1000 instances with this method per request.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersDeleteInstancesRequestResource = new RegionInstanceGroupManagersDeleteInstancesRequest();
     *     $response = $regionInstanceGroupManagersClient->deleteInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersDeleteInstancesRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                            $instanceGroupManager                                      Name of the managed instance group.
     * @param string                                            $project                                                   Project ID for this request.
     * @param string                                            $region                                                    Name of the region scoping this request.
     * @param RegionInstanceGroupManagersDeleteInstancesRequest $regionInstanceGroupManagersDeleteInstancesRequestResource The body resource for this request
     * @param array                                             $optionalArgs                                              {
     *                                                                                                                     Optional.
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
    public function deleteInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersDeleteInstancesRequestResource, array $optionalArgs = [])
    {
        $request = new DeleteInstancesRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersDeleteInstancesRequestResource($regionInstanceGroupManagersDeleteInstancesRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DeleteInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes selected per-instance configs for the managed instance group.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagerDeleteInstanceConfigReqResource = new RegionInstanceGroupManagerDeleteInstanceConfigReq();
     *     $response = $regionInstanceGroupManagersClient->deletePerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerDeleteInstanceConfigReqResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                            $instanceGroupManager                                      The name of the managed instance group. It should conform to RFC1035.
     * @param string                                            $project                                                   Project ID for this request.
     * @param string                                            $region                                                    Name of the region scoping this request, should conform to RFC1035.
     * @param RegionInstanceGroupManagerDeleteInstanceConfigReq $regionInstanceGroupManagerDeleteInstanceConfigReqResource The body resource for this request
     * @param array                                             $optionalArgs                                              {
     *                                                                                                                     Optional.
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
    public function deletePerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerDeleteInstanceConfigReqResource, array $optionalArgs = [])
    {
        $request = new DeletePerInstanceConfigsRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagerDeleteInstanceConfigReqResource($regionInstanceGroupManagerDeleteInstanceConfigReqResource);

        return $this->startCall(
            'DeletePerInstanceConfigs',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns all of the details about the specified managed instance group.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $response = $regionInstanceGroupManagersClient->get($instanceGroupManager, $project, $region);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager Name of the managed instance group to return.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request.
     * @param array  $optionalArgs         {
     *                                     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\InstanceGroupManager
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($instanceGroupManager, $project, $region, array $optionalArgs = [])
    {
        $request = new GetRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);

        return $this->startCall(
            'Get',
            InstanceGroupManager::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a managed instance group using the information that you specify in the request. After the group is created, instances in the group are created using the specified instance template. This operation is marked as DONE when the group is created even if the instances in the group have not yet been created. You must separately verify the status of the individual instances with the listmanagedinstances method.
     *
     * A regional managed instance group can contain up to 2000 instances.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManagerResource = new InstanceGroupManager();
     *     $project = '';
     *     $region = '';
     *     $response = $regionInstanceGroupManagersClient->insert($instanceGroupManagerResource, $project, $region);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param InstanceGroupManager $instanceGroupManagerResource The body resource for this request
     * @param string               $project                      Project ID for this request.
     * @param string               $region                       Name of the region scoping this request.
     * @param array                $optionalArgs                 {
     *                                                           Optional.
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
    public function insert($instanceGroupManagerResource, $project, $region, array $optionalArgs = [])
    {
        $request = new InsertRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManagerResource($instanceGroupManagerResource);
        $request->setProject($project);
        $request->setRegion($region);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Insert',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Retrieves the list of managed instance groups that are contained within the specified region.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $regionInstanceGroupManagersClient->list_($project, $region);
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
     *     $pagedResponse = $regionInstanceGroupManagersClient->list_($project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region scoping this request.
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
    public function list_($project, $region, array $optionalArgs = [])
    {
        $request = new ListRegionInstanceGroupManagersRequest();
        $request->setProject($project);
        $request->setRegion($region);
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
            RegionInstanceGroupManagerList::class,
            $request
        );
    }

    /**
     * Lists all errors thrown by actions on instances for a given regional managed instance group. The filter and orderBy query parameters are not supported.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $regionInstanceGroupManagersClient->listErrors($instanceGroupManager, $project, $region);
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
     *     $pagedResponse = $regionInstanceGroupManagersClient->listErrors($instanceGroupManager, $project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group. It must be a string that meets the requirements in RFC1035, or an unsigned long integer: must match regexp pattern: (?:[a-z](https://cloud.google.com?:[-a-z0-9]{0,61}[a-z0-9])?)|[1-9][0-9]{0,19}.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request. This should conform to RFC1035.
     * @param array  $optionalArgs         {
     *                                     Optional.
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
    public function listErrors($instanceGroupManager, $project, $region, array $optionalArgs = [])
    {
        $request = new ListErrorsRegionInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
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
            'ListErrors',
            $optionalArgs,
            RegionInstanceGroupManagersListErrorsResponse::class,
            $request
        );
    }

    /**
     * Lists the instances in the managed instance group and instances that are scheduled to be created. The list includes any current actions that the group has scheduled for its instances. The orderBy query parameter is not supported.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $regionInstanceGroupManagersClient->listManagedInstances($instanceGroupManager, $project, $region);
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
     *     $pagedResponse = $regionInstanceGroupManagersClient->listManagedInstances($instanceGroupManager, $project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request.
     * @param array  $optionalArgs         {
     *                                     Optional.
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
    public function listManagedInstances($instanceGroupManager, $project, $region, array $optionalArgs = [])
    {
        $request = new ListManagedInstancesRegionInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
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
            'ListManagedInstances',
            $optionalArgs,
            RegionInstanceGroupManagersListInstancesResponse::class,
            $request
        );
    }

    /**
     * Lists all of the per-instance configs defined for the managed instance group. The orderBy query parameter is not supported.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $regionInstanceGroupManagersClient->listPerInstanceConfigs($instanceGroupManager, $project, $region);
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
     *     $pagedResponse = $regionInstanceGroupManagersClient->listPerInstanceConfigs($instanceGroupManager, $project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group. It should conform to RFC1035.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request, should conform to RFC1035.
     * @param array  $optionalArgs         {
     *                                     Optional.
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
    public function listPerInstanceConfigs($instanceGroupManager, $project, $region, array $optionalArgs = [])
    {
        $request = new ListPerInstanceConfigsRegionInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
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
            'ListPerInstanceConfigs',
            $optionalArgs,
            RegionInstanceGroupManagersListInstanceConfigsResp::class,
            $request
        );
    }

    /**
     * Updates a managed instance group using the information that you specify in the request. This operation is marked as DONE when the group is patched even if the instances in the group are still in the process of being patched. You must separately verify the status of the individual instances with the listmanagedinstances method. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagerResource = new InstanceGroupManager();
     *     $project = '';
     *     $region = '';
     *     $response = $regionInstanceGroupManagersClient->patch($instanceGroupManager, $instanceGroupManagerResource, $project, $region);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string               $instanceGroupManager         The name of the instance group manager.
     * @param InstanceGroupManager $instanceGroupManagerResource The body resource for this request
     * @param string               $project                      Project ID for this request.
     * @param string               $region                       Name of the region scoping this request.
     * @param array                $optionalArgs                 {
     *                                                           Optional.
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
    public function patch($instanceGroupManager, $instanceGroupManagerResource, $project, $region, array $optionalArgs = [])
    {
        $request = new PatchRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagerResource($instanceGroupManagerResource);
        $request->setProject($project);
        $request->setRegion($region);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Patch',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Inserts or patches per-instance configs for the managed instance group. perInstanceConfig.name serves as a key used to distinguish whether to perform insert or patch.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagerPatchInstanceConfigReqResource = new RegionInstanceGroupManagerPatchInstanceConfigReq();
     *     $response = $regionInstanceGroupManagersClient->patchPerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerPatchInstanceConfigReqResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                           $instanceGroupManager                                     The name of the managed instance group. It should conform to RFC1035.
     * @param string                                           $project                                                  Project ID for this request.
     * @param string                                           $region                                                   Name of the region scoping this request, should conform to RFC1035.
     * @param RegionInstanceGroupManagerPatchInstanceConfigReq $regionInstanceGroupManagerPatchInstanceConfigReqResource The body resource for this request
     * @param array                                            $optionalArgs                                             {
     *                                                                                                                   Optional.
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
    public function patchPerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerPatchInstanceConfigReqResource, array $optionalArgs = [])
    {
        $request = new PatchPerInstanceConfigsRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagerPatchInstanceConfigReqResource($regionInstanceGroupManagerPatchInstanceConfigReqResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'PatchPerInstanceConfigs',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Flags the specified instances in the managed instance group to be immediately recreated. The instances are deleted and recreated using the current instance template for the managed instance group. This operation is marked as DONE when the flag is set even if the instances have not yet been recreated. You must separately verify the status of the recreating action with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * You can specify a maximum of 1000 instances with this method per request.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersRecreateRequestResource = new RegionInstanceGroupManagersRecreateRequest();
     *     $response = $regionInstanceGroupManagersClient->recreateInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersRecreateRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                     $instanceGroupManager                               Name of the managed instance group.
     * @param string                                     $project                                            Project ID for this request.
     * @param string                                     $region                                             Name of the region scoping this request.
     * @param RegionInstanceGroupManagersRecreateRequest $regionInstanceGroupManagersRecreateRequestResource The body resource for this request
     * @param array                                      $optionalArgs                                       {
     *                                                                                                       Optional.
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
    public function recreateInstances($instanceGroupManager, $project, $region, $regionInstanceGroupManagersRecreateRequestResource, array $optionalArgs = [])
    {
        $request = new RecreateInstancesRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersRecreateRequestResource($regionInstanceGroupManagersRecreateRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'RecreateInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the intended size of the managed instance group. If you increase the size, the group creates new instances using the current instance template. If you decrease the size, the group deletes one or more instances.
     *
     * The resize operation is marked DONE if the resize request is successful. The underlying actions take additional time. You must separately verify the status of the creating or deleting actions with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $size = 0;
     *     $response = $regionInstanceGroupManagersClient->resize($instanceGroupManager, $project, $region, $size);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager Name of the managed instance group.
     * @param string $project              Project ID for this request.
     * @param string $region               Name of the region scoping this request.
     * @param int    $size                 Number of instances that should exist in this instance group manager.
     * @param array  $optionalArgs         {
     *                                     Optional.
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
    public function resize($instanceGroupManager, $project, $region, $size, array $optionalArgs = [])
    {
        $request = new ResizeRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSize($size);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'Resize',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the instance template to use when creating new instances or recreating instances in this group. Existing instances are not affected.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersSetTemplateRequestResource = new RegionInstanceGroupManagersSetTemplateRequest();
     *     $response = $regionInstanceGroupManagersClient->setInstanceTemplate($instanceGroupManager, $project, $region, $regionInstanceGroupManagersSetTemplateRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                        $instanceGroupManager                                  The name of the managed instance group.
     * @param string                                        $project                                               Project ID for this request.
     * @param string                                        $region                                                Name of the region scoping this request.
     * @param RegionInstanceGroupManagersSetTemplateRequest $regionInstanceGroupManagersSetTemplateRequestResource The body resource for this request
     * @param array                                         $optionalArgs                                          {
     *                                                                                                             Optional.
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
    public function setInstanceTemplate($instanceGroupManager, $project, $region, $regionInstanceGroupManagersSetTemplateRequestResource, array $optionalArgs = [])
    {
        $request = new SetInstanceTemplateRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersSetTemplateRequestResource($regionInstanceGroupManagersSetTemplateRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetInstanceTemplate',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Modifies the target pools to which all new instances in this group are assigned. Existing instances in the group are not affected.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagersSetTargetPoolsRequestResource = new RegionInstanceGroupManagersSetTargetPoolsRequest();
     *     $response = $regionInstanceGroupManagersClient->setTargetPools($instanceGroupManager, $project, $region, $regionInstanceGroupManagersSetTargetPoolsRequestResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                           $instanceGroupManager                                     Name of the managed instance group.
     * @param string                                           $project                                                  Project ID for this request.
     * @param string                                           $region                                                   Name of the region scoping this request.
     * @param RegionInstanceGroupManagersSetTargetPoolsRequest $regionInstanceGroupManagersSetTargetPoolsRequestResource The body resource for this request
     * @param array                                            $optionalArgs                                             {
     *                                                                                                                   Optional.
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
    public function setTargetPools($instanceGroupManager, $project, $region, $regionInstanceGroupManagersSetTargetPoolsRequestResource, array $optionalArgs = [])
    {
        $request = new SetTargetPoolsRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagersSetTargetPoolsRequestResource($regionInstanceGroupManagersSetTargetPoolsRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetTargetPools',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Inserts or updates per-instance configs for the managed instance group. perInstanceConfig.name serves as a key used to distinguish whether to perform insert or patch.
     *
     * Sample code:
     * ```
     * $regionInstanceGroupManagersClient = new RegionInstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $region = '';
     *     $regionInstanceGroupManagerUpdateInstanceConfigReqResource = new RegionInstanceGroupManagerUpdateInstanceConfigReq();
     *     $response = $regionInstanceGroupManagersClient->updatePerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerUpdateInstanceConfigReqResource);
     * } finally {
     *     $regionInstanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                            $instanceGroupManager                                      The name of the managed instance group. It should conform to RFC1035.
     * @param string                                            $project                                                   Project ID for this request.
     * @param string                                            $region                                                    Name of the region scoping this request, should conform to RFC1035.
     * @param RegionInstanceGroupManagerUpdateInstanceConfigReq $regionInstanceGroupManagerUpdateInstanceConfigReqResource The body resource for this request
     * @param array                                             $optionalArgs                                              {
     *                                                                                                                     Optional.
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
    public function updatePerInstanceConfigs($instanceGroupManager, $project, $region, $regionInstanceGroupManagerUpdateInstanceConfigReqResource, array $optionalArgs = [])
    {
        $request = new UpdatePerInstanceConfigsRegionInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionInstanceGroupManagerUpdateInstanceConfigReqResource($regionInstanceGroupManagerUpdateInstanceConfigReqResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'UpdatePerInstanceConfigs',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
