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
use Google\Cloud\Compute\V1\AddNodesNodeGroupRequest;
use Google\Cloud\Compute\V1\AggregatedListNodeGroupsRequest;
use Google\Cloud\Compute\V1\DeleteNodeGroupRequest;
use Google\Cloud\Compute\V1\DeleteNodesNodeGroupRequest;
use Google\Cloud\Compute\V1\GetIamPolicyNodeGroupRequest;
use Google\Cloud\Compute\V1\GetNodeGroupRequest;
use Google\Cloud\Compute\V1\InsertNodeGroupRequest;
use Google\Cloud\Compute\V1\ListNodeGroupsRequest;
use Google\Cloud\Compute\V1\ListNodesNodeGroupsRequest;
use Google\Cloud\Compute\V1\NodeGroup;
use Google\Cloud\Compute\V1\NodeGroupAggregatedList;
use Google\Cloud\Compute\V1\NodeGroupList;
use Google\Cloud\Compute\V1\NodeGroupsAddNodesRequest;
use Google\Cloud\Compute\V1\NodeGroupsDeleteNodesRequest;
use Google\Cloud\Compute\V1\NodeGroupsListNodes;
use Google\Cloud\Compute\V1\NodeGroupsSetNodeTemplateRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\PatchNodeGroupRequest;
use Google\Cloud\Compute\V1\Policy;
use Google\Cloud\Compute\V1\SetIamPolicyNodeGroupRequest;
use Google\Cloud\Compute\V1\SetNodeTemplateNodeGroupRequest;
use Google\Cloud\Compute\V1\TestIamPermissionsNodeGroupRequest;
use Google\Cloud\Compute\V1\TestPermissionsRequest;
use Google\Cloud\Compute\V1\TestPermissionsResponse;
use Google\Cloud\Compute\V1\ZoneSetPolicyRequest;

/**
 * Service Description: The NodeGroups API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $nodeGroupsClient = new NodeGroupsClient();
 * try {
 *     $nodeGroup = '';
 *     $nodeGroupsAddNodesRequestResource = new NodeGroupsAddNodesRequest();
 *     $project = '';
 *     $zone = '';
 *     $response = $nodeGroupsClient->addNodes($nodeGroup, $nodeGroupsAddNodesRequestResource, $project, $zone);
 * } finally {
 *     $nodeGroupsClient->close();
 * }
 * ```
 *
 * @experimental
 */
class NodeGroupsGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.NodeGroups';

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
            'clientConfig' => __DIR__.'/../resources/node_groups_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/node_groups_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/node_groups_rest_client_config.php',
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
     * Adds specified number of nodes to the node group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $nodeGroupsAddNodesRequestResource = new NodeGroupsAddNodesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->addNodes($nodeGroup, $nodeGroupsAddNodesRequestResource, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string                    $nodeGroup                         Name of the NodeGroup resource.
     * @param NodeGroupsAddNodesRequest $nodeGroupsAddNodesRequestResource The body resource for this request
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
    public function addNodes($nodeGroup, $nodeGroupsAddNodesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new AddNodesNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
        $request->setNodeGroupsAddNodesRequestResource($nodeGroupsAddNodesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'AddNodes',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Retrieves an aggregated list of node groups. Note: use nodeGroups.listNodes for more details about each group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $nodeGroupsClient->aggregatedList($project);
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
     *     $pagedResponse = $nodeGroupsClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $nodeGroupsClient->close();
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
        $request = new AggregatedListNodeGroupsRequest();
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
            NodeGroupAggregatedList::class,
            $request
        );
    }

    /**
     * Deletes the specified NodeGroup resource.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->delete($nodeGroup, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string $nodeGroup    Name of the NodeGroup resource to delete.
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
    public function delete($nodeGroup, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
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
     * Deletes specified nodes from the node group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $nodeGroupsDeleteNodesRequestResource = new NodeGroupsDeleteNodesRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->deleteNodes($nodeGroup, $nodeGroupsDeleteNodesRequestResource, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string                       $nodeGroup                            Name of the NodeGroup resource whose nodes will be deleted.
     * @param NodeGroupsDeleteNodesRequest $nodeGroupsDeleteNodesRequestResource The body resource for this request
     * @param string                       $project                              Project ID for this request.
     * @param string                       $zone                                 The name of the zone for this request.
     * @param array                        $optionalArgs                         {
     *                                                                           Optional.
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
    public function deleteNodes($nodeGroup, $nodeGroupsDeleteNodesRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new DeleteNodesNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
        $request->setNodeGroupsDeleteNodesRequestResource($nodeGroupsDeleteNodesRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DeleteNodes',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the specified NodeGroup. Get a list of available NodeGroups by making a list() request. Note: the "nodes" field should not be used. Use nodeGroups.listNodes instead.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->get($nodeGroup, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string $nodeGroup    Name of the node group to return.
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
     * @return \Google\Cloud\Compute\V1\NodeGroup
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($nodeGroup, $project, $zone, array $optionalArgs = [])
    {
        $request = new GetNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
        $request->setProject($project);
        $request->setZone($zone);

        return $this->startCall(
            'Get',
            NodeGroup::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the access control policy for a resource. May be empty if no such policy or resource exists.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->getIamPolicy($project, $resource, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
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
        $request = new GetIamPolicyNodeGroupRequest();
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
     * Creates a NodeGroup resource in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $initialNodeCount = 0;
     *     $nodeGroupResource = new NodeGroup();
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->insert($initialNodeCount, $nodeGroupResource, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param int       $initialNodeCount  Initial count of nodes in the node group.
     * @param NodeGroup $nodeGroupResource The body resource for this request
     * @param string    $project           Project ID for this request.
     * @param string    $zone              The name of the zone for this request.
     * @param array     $optionalArgs      {
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
    public function insert($initialNodeCount, $nodeGroupResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new InsertNodeGroupRequest();
        $request->setInitialNodeCount($initialNodeCount);
        $request->setNodeGroupResource($nodeGroupResource);
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
     * Retrieves a list of node groups available to the specified project. Note: use nodeGroups.listNodes for more details about each group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $nodeGroupsClient->list_($project, $zone);
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
     *     $pagedResponse = $nodeGroupsClient->list_($project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $nodeGroupsClient->close();
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
        $request = new ListNodeGroupsRequest();
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
            NodeGroupList::class,
            $request
        );
    }

    /**
     * Lists nodes in the node group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $project = '';
     *     $zone = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $nodeGroupsClient->listNodes($nodeGroup, $project, $zone);
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
     *     $pagedResponse = $nodeGroupsClient->listNodes($nodeGroup, $project, $zone);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string $nodeGroup    Name of the NodeGroup resource whose nodes you want to list.
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
    public function listNodes($nodeGroup, $project, $zone, array $optionalArgs = [])
    {
        $request = new ListNodesNodeGroupsRequest();
        $request->setNodeGroup($nodeGroup);
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
            'ListNodes',
            $optionalArgs,
            NodeGroupsListNodes::class,
            $request
        );
    }

    /**
     * Updates the specified node group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $nodeGroupResource = new NodeGroup();
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->patch($nodeGroup, $nodeGroupResource, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string    $nodeGroup         Name of the NodeGroup resource to update.
     * @param NodeGroup $nodeGroupResource The body resource for this request
     * @param string    $project           Project ID for this request.
     * @param string    $zone              The name of the zone for this request.
     * @param array     $optionalArgs      {
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
    public function patch($nodeGroup, $nodeGroupResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new PatchNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
        $request->setNodeGroupResource($nodeGroupResource);
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
     * Sets the access control policy on the specified resource. Replaces any existing policy.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $zone = '';
     *     $zoneSetPolicyRequestResource = new ZoneSetPolicyRequest();
     *     $response = $nodeGroupsClient->setIamPolicy($project, $resource, $zone, $zoneSetPolicyRequestResource);
     * } finally {
     *     $nodeGroupsClient->close();
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
        $request = new SetIamPolicyNodeGroupRequest();
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
     * Updates the node template of the node group.
     *
     * Sample code:
     * ```
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $nodeGroup = '';
     *     $nodeGroupsSetNodeTemplateRequestResource = new NodeGroupsSetNodeTemplateRequest();
     *     $project = '';
     *     $zone = '';
     *     $response = $nodeGroupsClient->setNodeTemplate($nodeGroup, $nodeGroupsSetNodeTemplateRequestResource, $project, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
     * }
     * ```
     *
     * @param string                           $nodeGroup                                Name of the NodeGroup resource to update.
     * @param NodeGroupsSetNodeTemplateRequest $nodeGroupsSetNodeTemplateRequestResource The body resource for this request
     * @param string                           $project                                  Project ID for this request.
     * @param string                           $zone                                     The name of the zone for this request.
     * @param array                            $optionalArgs                             {
     *                                                                                   Optional.
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
    public function setNodeTemplate($nodeGroup, $nodeGroupsSetNodeTemplateRequestResource, $project, $zone, array $optionalArgs = [])
    {
        $request = new SetNodeTemplateNodeGroupRequest();
        $request->setNodeGroup($nodeGroup);
        $request->setNodeGroupsSetNodeTemplateRequestResource($nodeGroupsSetNodeTemplateRequestResource);
        $request->setProject($project);
        $request->setZone($zone);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetNodeTemplate',
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
     * $nodeGroupsClient = new NodeGroupsClient();
     * try {
     *     $project = '';
     *     $resource = '';
     *     $testPermissionsRequestResource = new TestPermissionsRequest();
     *     $zone = '';
     *     $response = $nodeGroupsClient->testIamPermissions($project, $resource, $testPermissionsRequestResource, $zone);
     * } finally {
     *     $nodeGroupsClient->close();
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
        $request = new TestIamPermissionsNodeGroupRequest();
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
}
