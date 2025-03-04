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
use Google\Cloud\Compute\V1\AbandonInstancesInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\AggregatedListInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ApplyUpdatesToInstancesInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\CreateInstancesInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeleteInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeleteInstancesInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\DeletePerInstanceConfigsInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\GetInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\InsertInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\InstanceGroupManager;
use Google\Cloud\Compute\V1\InstanceGroupManagerAggregatedList;
use Google\Cloud\Compute\V1\InstanceGroupManagerList;
use Google\Cloud\Compute\V1\InstanceGroupManagersAbandonInstancesRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersApplyUpdatesRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersCreateInstancesRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersDeleteInstancesRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersDeletePerInstanceConfigsReq;
use Google\Cloud\Compute\V1\InstanceGroupManagersListErrorsResponse;
use Google\Cloud\Compute\V1\InstanceGroupManagersListManagedInstancesResponse;
use Google\Cloud\Compute\V1\InstanceGroupManagersListPerInstanceConfigsResp;
use Google\Cloud\Compute\V1\InstanceGroupManagersPatchPerInstanceConfigsReq;
use Google\Cloud\Compute\V1\InstanceGroupManagersRecreateInstancesRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersSetInstanceTemplateRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersSetTargetPoolsRequest;
use Google\Cloud\Compute\V1\InstanceGroupManagersUpdatePerInstanceConfigsReq;
use Google\Cloud\Compute\V1\ListErrorsInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListManagedInstancesInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\ListPerInstanceConfigsInstanceGroupManagersRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\PatchInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\PatchPerInstanceConfigsInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\RecreateInstancesInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\ResizeInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\SetInstanceTemplateInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\SetTargetPoolsInstanceGroupManagerRequest;
use Google\Cloud\Compute\V1\UpdatePerInstanceConfigsInstanceGroupManagerRequest;

/**
 * Service Description: The InstanceGroupManagers API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $instanceGroupManagersClient = new InstanceGroupManagersClient();
 * try {
 *     $instanceGroupManager = '';
 *     $instanceGroupManagersAbandonInstancesRequestResource = new InstanceGroupManagersAbandonInstancesRequest();
 *     $project = '';
 *     $zone = '';
 *     $response = $instanceGroupManagersClient->abandonInstances($instanceGroupManager, $instanceGroupManagersAbandonInstancesRequestResource, $project, $zone);
 * } finally {
 *     $instanceGroupManagersClient->close();
 * }
 * ```
 *
 * @experimental
 */
class InstanceGroupManagersGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.InstanceGroupManagers';

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
            'clientConfig' => __DIR__.'/../resources/instance_group_managers_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/instance_group_managers_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/instance_group_managers_rest_client_config.php',
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
     * Flags the specified instances to be removed from the managed instance group. Abandoning an instance does not delete the instance, but it does remove the instance from any target pools that are applied by the managed instance group. This method reduces the targetSize of the managed instance group by the number of instances that you abandon. This operation is marked as DONE when the action is scheduled even if the instances have not yet been removed from the group. You must separately verify the status of the abandoning action with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * You can specify a maximum of 1000 instances with this method per request.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersAbandonInstancesRequestResource = new InstanceGroupManagersAbandonInstancesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->abandonInstances($instanceGroupManager, $instanceGroupManagersAbandonInstancesRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                       $instanceGroupManager                                 The name of the managed instance group.
     * @param InstanceGroupManagersAbandonInstancesRequest $instanceGroupManagersAbandonInstancesRequestResource The body resource for this request
     * @param string                                       $project                                              Project ID for this request.
     * @param string                                       $zone                                                 The name of the zone where the managed instance group is located.
     * @param array                                        $optionalArgs                                         {
     *                                                                                                           Optional.
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
    public function abandonInstances($instanceGroupManager, $instanceGroupManagersAbandonInstancesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new AbandonInstancesInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersAbandonInstancesRequestResource($instanceGroupManagersAbandonInstancesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * Retrieves the list of managed instance groups and groups them by zone.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instanceGroupManagersClient->aggregatedList($project);
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
     *     $pagedResponse = $instanceGroupManagersClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instanceGroupManagersClient->close();
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
        $request = new AggregatedListInstanceGroupManagersRequest();
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
            InstanceGroupManagerAggregatedList::class,
            $request
        );
    }

    /**
     * Applies changes to selected instances on the managed instance group. This method can be used to apply new overrides and/or new versions.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersApplyUpdatesRequestResource = new InstanceGroupManagersApplyUpdatesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->applyUpdatesToInstances($instanceGroupManager, $instanceGroupManagersApplyUpdatesRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                   $instanceGroupManager                             The name of the managed instance group, should conform to RFC1035.
     * @param InstanceGroupManagersApplyUpdatesRequest $instanceGroupManagersApplyUpdatesRequestResource The body resource for this request
     * @param string                                   $project                                          Project ID for this request.
     * @param string                                   $zone                                             The name of the zone where the managed instance group is located. Should conform to RFC1035.
     * @param array                                    $optionalArgs                                     {
     *                                                                                                   Optional.
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
    public function applyUpdatesToInstances($instanceGroupManager, $instanceGroupManagersApplyUpdatesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new ApplyUpdatesToInstancesInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersApplyUpdatesRequestResource($instanceGroupManagersApplyUpdatesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'ApplyUpdatesToInstances',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates instances with per-instance configs in this managed instance group. Instances are created using the current instance template. The create instances operation is marked DONE if the createInstances request is successful. The underlying actions take additional time. You must separately verify the status of the creating or actions with the listmanagedinstances method.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersCreateInstancesRequestResource = new InstanceGroupManagersCreateInstancesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->createInstances($instanceGroupManager, $instanceGroupManagersCreateInstancesRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                      $instanceGroupManager                                The name of the managed instance group. It should conform to RFC1035.
     * @param InstanceGroupManagersCreateInstancesRequest $instanceGroupManagersCreateInstancesRequestResource The body resource for this request
     * @param string                                      $project                                             Project ID for this request.
     * @param string                                      $zone                                                The name of the zone where the managed instance group is located. It should conform to RFC1035.
     * @param array                                       $optionalArgs                                        {
     *                                                                                                         Optional.
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
    public function createInstances($instanceGroupManager, $instanceGroupManagersCreateInstancesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new CreateInstancesInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersCreateInstancesRequestResource($instanceGroupManagersCreateInstancesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * Deletes the specified managed instance group and all of the instances in that group. Note that the instance group must not belong to a backend service. Read  Deleting an instance group for more information.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->delete($instanceGroupManager, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group to delete.
     * @param string $project              Project ID for this request.
     * @param string $zone                 The name of the zone where the managed instance group is located.
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
    public function delete($instanceGroupManager, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
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
     * Flags the specified instances in the managed instance group for immediate deletion. The instances are also removed from any target pools of which they were a member. This method reduces the targetSize of the managed instance group by the number of instances that you delete. This operation is marked as DONE when the action is scheduled even if the instances are still being deleted. You must separately verify the status of the deleting action with the listmanagedinstances method.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * You can specify a maximum of 1000 instances with this method per request.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersDeleteInstancesRequestResource = new InstanceGroupManagersDeleteInstancesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->deleteInstances($instanceGroupManager, $instanceGroupManagersDeleteInstancesRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                      $instanceGroupManager                                The name of the managed instance group.
     * @param InstanceGroupManagersDeleteInstancesRequest $instanceGroupManagersDeleteInstancesRequestResource The body resource for this request
     * @param string                                      $project                                             Project ID for this request.
     * @param string                                      $zone                                                The name of the zone where the managed instance group is located.
     * @param array                                       $optionalArgs                                        {
     *                                                                                                         Optional.
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
    public function deleteInstances($instanceGroupManager, $instanceGroupManagersDeleteInstancesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteInstancesInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersDeleteInstancesRequestResource($instanceGroupManagersDeleteInstancesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersDeletePerInstanceConfigsReqResource = new InstanceGroupManagersDeletePerInstanceConfigsReq();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->deletePerInstanceConfigs($instanceGroupManager, $instanceGroupManagersDeletePerInstanceConfigsReqResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                           $instanceGroupManager                                     The name of the managed instance group. It should conform to RFC1035.
     * @param InstanceGroupManagersDeletePerInstanceConfigsReq $instanceGroupManagersDeletePerInstanceConfigsReqResource The body resource for this request
     * @param string                                           $project                                                  Project ID for this request.
     * @param string                                           $zone                                                     The name of the zone where the managed instance group is located. It should conform to RFC1035.
     * @param array                                            $optionalArgs                                             {
     *                                                                                                                   Optional.
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
    public function deletePerInstanceConfigs($instanceGroupManager, $instanceGroupManagersDeletePerInstanceConfigsReqResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeletePerInstanceConfigsInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersDeletePerInstanceConfigsReqResource($instanceGroupManagersDeletePerInstanceConfigsReqResource);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'DeletePerInstanceConfigs',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns all of the details about the specified managed instance group. Gets a list of available managed instance groups by making a list() request.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->get($instanceGroupManager, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group.
     * @param string $project              Project ID for this request.
     * @param string $zone                 The name of the zone where the managed instance group is located.
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
    public function get($instanceGroupManager, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setZone($zone);

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
     * A managed instance group can have up to 1000 VM instances per group. Please contact Cloud Support if you need an increase in this limit.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManagerResource = new InstanceGroupManager();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->insert($instanceGroupManagerResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param InstanceGroupManager $instanceGroupManagerResource The body resource for this request
     * @param string               $project                      Project ID for this request.
     * @param string               $zone                         The name of the zone where you want to create the managed instance group.
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
    public function insert($instanceGroupManagerResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new InsertInstanceGroupManagerRequest();
        $request->setInstanceGroupManagerResource($instanceGroupManagerResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * Retrieves a list of managed instance groups that are contained within the specified project and zone.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instanceGroupManagersClient->list_($project, $zone);
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
     *     $pagedResponse = $instanceGroupManagersClient->list_($project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $zone         The name of the zone where the managed instance group is located.
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
        $request = new ListInstanceGroupManagersRequest();
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
            InstanceGroupManagerList::class,
            $request
        );
    }

    /**
     * Lists all errors thrown by actions on instances for a given managed instance group. The filter and orderBy query parameters are not supported.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instanceGroupManagersClient->listErrors($instanceGroupManager, $project, $zone);
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
     *     $pagedResponse = $instanceGroupManagersClient->listErrors($instanceGroupManager, $project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group. It must be a string that meets the requirements in RFC1035, or an unsigned long integer: must match regexp pattern: (?:[a-z](https://cloud.google.com?:[-a-z0-9]{0,61}[a-z0-9])?)|[1-9][0-9]{0,19}.
     * @param string $project              Project ID for this request.
     * @param string $zone                 The name of the zone where the managed instance group is located. It should conform to RFC1035.
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
    public function listErrors($instanceGroupManager, $project, $zone, array $optionalArgs = [])
    {
        $request = new ListErrorsInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
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
            'ListErrors',
            $optionalArgs,
            InstanceGroupManagersListErrorsResponse::class,
            $request
        );
    }

    /**
     * Lists all of the instances in the managed instance group. Each instance in the list has a currentAction, which indicates the action that the managed instance group is performing on the instance. For example, if the group is still creating an instance, the currentAction is CREATING. If a previous action failed, the list displays the errors for that failed action. The orderBy query parameter is not supported.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instanceGroupManagersClient->listManagedInstances($instanceGroupManager, $project, $zone);
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
     *     $pagedResponse = $instanceGroupManagersClient->listManagedInstances($instanceGroupManager, $project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group.
     * @param string $project              Project ID for this request.
     * @param string $zone                 The name of the zone where the managed instance group is located.
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
    public function listManagedInstances($instanceGroupManager, $project, $zone, array $optionalArgs = [])
    {
        $request = new ListManagedInstancesInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
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
            'ListManagedInstances',
            $optionalArgs,
            InstanceGroupManagersListManagedInstancesResponse::class,
            $request
        );
    }

    /**
     * Lists all of the per-instance configs defined for the managed instance group. The orderBy query parameter is not supported.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $instanceGroupManagersClient->listPerInstanceConfigs($instanceGroupManager, $project, $zone);
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
     *     $pagedResponse = $instanceGroupManagersClient->listPerInstanceConfigs($instanceGroupManager, $project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group. It should conform to RFC1035.
     * @param string $project              Project ID for this request.
     * @param string $zone                 The name of the zone where the managed instance group is located. It should conform to RFC1035.
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
    public function listPerInstanceConfigs($instanceGroupManager, $project, $zone, array $optionalArgs = [])
    {
        $request = new ListPerInstanceConfigsInstanceGroupManagersRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
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
            'ListPerInstanceConfigs',
            $optionalArgs,
            InstanceGroupManagersListPerInstanceConfigsResp::class,
            $request
        );
    }

    /**
     * Updates a managed instance group using the information that you specify in the request. This operation is marked as DONE when the group is patched even if the instances in the group are still in the process of being patched. You must separately verify the status of the individual instances with the listManagedInstances method. This method supports PATCH semantics and uses the JSON merge patch format and processing rules.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagerResource = new InstanceGroupManager();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->patch($instanceGroupManager, $instanceGroupManagerResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string               $instanceGroupManager         The name of the instance group manager.
     * @param InstanceGroupManager $instanceGroupManagerResource The body resource for this request
     * @param string               $project                      Project ID for this request.
     * @param string               $zone                         The name of the zone where you want to create the managed instance group.
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
    public function patch($instanceGroupManager, $instanceGroupManagerResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new PatchInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagerResource($instanceGroupManagerResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersPatchPerInstanceConfigsReqResource = new InstanceGroupManagersPatchPerInstanceConfigsReq();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->patchPerInstanceConfigs($instanceGroupManager, $instanceGroupManagersPatchPerInstanceConfigsReqResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                          $instanceGroupManager                                    The name of the managed instance group. It should conform to RFC1035.
     * @param InstanceGroupManagersPatchPerInstanceConfigsReq $instanceGroupManagersPatchPerInstanceConfigsReqResource The body resource for this request
     * @param string                                          $project                                                 Project ID for this request.
     * @param string                                          $zone                                                    The name of the zone where the managed instance group is located. It should conform to RFC1035.
     * @param array                                           $optionalArgs                                            {
     *                                                                                                                 Optional.
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
    public function patchPerInstanceConfigs($instanceGroupManager, $instanceGroupManagersPatchPerInstanceConfigsReqResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new PatchPerInstanceConfigsInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersPatchPerInstanceConfigsReqResource($instanceGroupManagersPatchPerInstanceConfigsReqResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersRecreateInstancesRequestResource = new InstanceGroupManagersRecreateInstancesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->recreateInstances($instanceGroupManager, $instanceGroupManagersRecreateInstancesRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                        $instanceGroupManager                                  The name of the managed instance group.
     * @param InstanceGroupManagersRecreateInstancesRequest $instanceGroupManagersRecreateInstancesRequestResource The body resource for this request
     * @param string                                        $project                                               Project ID for this request.
     * @param string                                        $zone                                                  The name of the zone where the managed instance group is located.
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
    public function recreateInstances($instanceGroupManager, $instanceGroupManagersRecreateInstancesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new RecreateInstancesInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersRecreateInstancesRequestResource($instanceGroupManagersRecreateInstancesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * Resizes the managed instance group. If you increase the size, the group creates new instances using the current instance template. If you decrease the size, the group deletes instances. The resize operation is marked DONE when the resize actions are scheduled even if the group has not yet added or deleted any instances. You must separately verify the status of the creating or deleting actions with the listmanagedinstances method.
     *
     * When resizing down, the instance group arbitrarily chooses the order in which VMs are deleted. The group takes into account some VM attributes when making the selection including:
     *
     * + The status of the VM instance. + The health of the VM instance. + The instance template version the VM is based on. + For regional managed instance groups, the location of the VM instance.
     *
     * This list is subject to change.
     *
     * If the group is part of a backend service that has enabled connection draining, it can take up to 60 seconds after the connection draining duration has elapsed before the VM instance is removed or deleted.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $project = '';
     *     $size = 0;
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->resize($instanceGroupManager, $project, $size, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string $instanceGroupManager The name of the managed instance group.
     * @param string $project              Project ID for this request.
     * @param int    $size                 The number of running instances that the managed instance group should maintain at any given time. The group automatically adds or removes instances to maintain the number of instances specified by this parameter.
     * @param string $zone                 The name of the zone where the managed instance group is located.
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
    public function resize($instanceGroupManager, $project, $size, $zone, array $optionalArgs = [])
    {
        $request = new ResizeInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setProject($project);
        $request->setSize($size);
        $request->setZone($zone);
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
     * Specifies the instance template to use when creating new instances in this group. The templates for existing instances in the group do not change unless you run recreateInstances, run applyUpdatesToInstances, or set the group's updatePolicy.type to PROACTIVE.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersSetInstanceTemplateRequestResource = new InstanceGroupManagersSetInstanceTemplateRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->setInstanceTemplate($instanceGroupManager, $instanceGroupManagersSetInstanceTemplateRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                          $instanceGroupManager                                    The name of the managed instance group.
     * @param InstanceGroupManagersSetInstanceTemplateRequest $instanceGroupManagersSetInstanceTemplateRequestResource The body resource for this request
     * @param string                                          $project                                                 Project ID for this request.
     * @param string                                          $zone                                                    The name of the zone where the managed instance group is located.
     * @param array                                           $optionalArgs                                            {
     *                                                                                                                 Optional.
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
    public function setInstanceTemplate($instanceGroupManager, $instanceGroupManagersSetInstanceTemplateRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetInstanceTemplateInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersSetInstanceTemplateRequestResource($instanceGroupManagersSetInstanceTemplateRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * Modifies the target pools to which all instances in this managed instance group are assigned. The target pools automatically apply to all of the instances in the managed instance group. This operation is marked DONE when you make the request even if the instances have not yet been added to their target pools. The change might take some time to apply to all of the instances in the group depending on the size of the group.
     *
     * Sample code:
     * ```
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersSetTargetPoolsRequestResource = new InstanceGroupManagersSetTargetPoolsRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->setTargetPools($instanceGroupManager, $instanceGroupManagersSetTargetPoolsRequestResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                     $instanceGroupManager                               The name of the managed instance group.
     * @param InstanceGroupManagersSetTargetPoolsRequest $instanceGroupManagersSetTargetPoolsRequestResource The body resource for this request
     * @param string                                     $project                                            Project ID for this request.
     * @param string                                     $zone                                               The name of the zone where the managed instance group is located.
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
    public function setTargetPools($instanceGroupManager, $instanceGroupManagersSetTargetPoolsRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetTargetPoolsInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersSetTargetPoolsRequestResource($instanceGroupManagersSetTargetPoolsRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
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
     * $instanceGroupManagersClient = new InstanceGroupManagersClient();
     * try {
     *     $instanceGroupManager = '';
     *     $instanceGroupManagersUpdatePerInstanceConfigsReqResource = new InstanceGroupManagersUpdatePerInstanceConfigsReq();
     *     $project = '';
     *     $zone = '';
     *     $response = $instanceGroupManagersClient->updatePerInstanceConfigs($instanceGroupManager, $instanceGroupManagersUpdatePerInstanceConfigsReqResource, $project, $zone);
     * } finally {
     *     $instanceGroupManagersClient->close();
     * }
     * ```
     *
     * @param string                                           $instanceGroupManager                                     The name of the managed instance group. It should conform to RFC1035.
     * @param InstanceGroupManagersUpdatePerInstanceConfigsReq $instanceGroupManagersUpdatePerInstanceConfigsReqResource The body resource for this request
     * @param string                                           $project                                                  Project ID for this request.
     * @param string                                           $zone                                                     The name of the zone where the managed instance group is located. It should conform to RFC1035.
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
    public function updatePerInstanceConfigs($instanceGroupManager, $instanceGroupManagersUpdatePerInstanceConfigsReqResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new UpdatePerInstanceConfigsInstanceGroupManagerRequest();
        $request->setInstanceGroupManager($instanceGroupManager);
        $request->setInstanceGroupManagersUpdatePerInstanceConfigsReqResource($instanceGroupManagersUpdatePerInstanceConfigsReqResource);
        $request->setProject($project);
        $request->setZone($zone);
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
