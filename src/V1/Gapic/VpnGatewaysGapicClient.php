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
use Google\Cloud\Compute\V1\AggregatedListVpnGatewaysRequest;
use Google\Cloud\Compute\V1\DeleteVpnGatewayRequest;
use Google\Cloud\Compute\V1\GetStatusVpnGatewayRequest;
use Google\Cloud\Compute\V1\GetVpnGatewayRequest;
use Google\Cloud\Compute\V1\InsertVpnGatewayRequest;
use Google\Cloud\Compute\V1\ListVpnGatewaysRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\RegionSetLabelsRequest;
use Google\Cloud\Compute\V1\SetLabelsVpnGatewayRequest;
use Google\Cloud\Compute\V1\TestIamPermissionsVpnGatewayRequest;
use Google\Cloud\Compute\V1\TestPermissionsRequest;
use Google\Cloud\Compute\V1\TestPermissionsResponse;
use Google\Cloud\Compute\V1\VpnGateway;
use Google\Cloud\Compute\V1\VpnGatewayAggregatedList;
use Google\Cloud\Compute\V1\VpnGatewayList;
use Google\Cloud\Compute\V1\VpnGatewaysGetStatusResponse;

/**
 * Service Description: The VpnGateways API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $vpnGatewaysClient = new VpnGatewaysClient();
 * try {
 *     $project = '';
 *     // Iterate over pages of elements
 *     $pagedResponse = $vpnGatewaysClient->aggregatedList($project);
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
 *     $pagedResponse = $vpnGatewaysClient->aggregatedList($project);
 *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $vpnGatewaysClient->close();
 * }
 * ```
 *
 * @experimental
 */
class VpnGatewaysGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.VpnGateways';

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
            'clientConfig' => __DIR__.'/../resources/vpn_gateways_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/vpn_gateways_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/vpn_gateways_rest_client_config.php',
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
     * Retrieves an aggregated list of VPN gateways.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $vpnGatewaysClient->aggregatedList($project);
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
     *     $pagedResponse = $vpnGatewaysClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $vpnGatewaysClient->close();
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
        $request = new AggregatedListVpnGatewaysRequest();
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
            VpnGatewayAggregatedList::class,
            $request
        );
    }

    /**
     * Deletes the specified VPN gateway.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $vpnGateway = '';
     *     $response = $vpnGatewaysClient->delete($project, $region, $vpnGateway);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param string $vpnGateway   Name of the VPN gateway to delete.
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
    public function delete($project, $region, $vpnGateway, array $optionalArgs = [])
    {
        $request = new DeleteVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setVpnGateway($vpnGateway);
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
     * Returns the specified VPN gateway. Gets a list of available VPN gateways by making a list() request.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $vpnGateway = '';
     *     $response = $vpnGatewaysClient->get($project, $region, $vpnGateway);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param string $vpnGateway   Name of the VPN gateway to return.
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
     * @return \Google\Cloud\Compute\V1\VpnGateway
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($project, $region, $vpnGateway, array $optionalArgs = [])
    {
        $request = new GetVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setVpnGateway($vpnGateway);

        return $this->startCall(
            'Get',
            VpnGateway::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the status for the specified VPN gateway.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $vpnGateway = '';
     *     $response = $vpnGatewaysClient->getStatus($project, $region, $vpnGateway);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param string $vpnGateway   Name of the VPN gateway to return.
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
     * @return \Google\Cloud\Compute\V1\VpnGatewaysGetStatusResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getStatus($project, $region, $vpnGateway, array $optionalArgs = [])
    {
        $request = new GetStatusVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setVpnGateway($vpnGateway);

        return $this->startCall(
            'GetStatus',
            VpnGatewaysGetStatusResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a VPN gateway in the specified project and region using the data included in the request.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $vpnGatewayResource = new VpnGateway();
     *     $response = $vpnGatewaysClient->insert($project, $region, $vpnGatewayResource);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string     $project            Project ID for this request.
     * @param string     $region             Name of the region for this request.
     * @param VpnGateway $vpnGatewayResource The body resource for this request
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
    public function insert($project, $region, $vpnGatewayResource, array $optionalArgs = [])
    {
        $request = new InsertVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setVpnGatewayResource($vpnGatewayResource);
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
     * Retrieves a list of VPN gateways available to the specified project and region.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $vpnGatewaysClient->list_($project, $region);
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
     *     $pagedResponse = $vpnGatewaysClient->list_($project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
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
        $request = new ListVpnGatewaysRequest();
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
            VpnGatewayList::class,
            $request
        );
    }

    /**
     * Sets the labels on a VpnGateway. To learn more about labels, read the Labeling Resources documentation.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $regionSetLabelsRequestResource = new RegionSetLabelsRequest();
     *     $resource = '';
     *     $response = $vpnGatewaysClient->setLabels($project, $region, $regionSetLabelsRequestResource, $resource);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string                 $project                        Project ID for this request.
     * @param string                 $region                         The region for this request.
     * @param RegionSetLabelsRequest $regionSetLabelsRequestResource The body resource for this request
     * @param string                 $resource                       Name or id of the resource for this request.
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
    public function setLabels($project, $region, $regionSetLabelsRequestResource, $resource, array $optionalArgs = [])
    {
        $request = new SetLabelsVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionSetLabelsRequestResource($regionSetLabelsRequestResource);
        $request->setResource($resource);
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
     * Returns permissions that a caller has on the specified resource.
     *
     * Sample code:
     * ```
     * $vpnGatewaysClient = new VpnGatewaysClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $resource = '';
     *     $testPermissionsRequestResource = new TestPermissionsRequest();
     *     $response = $vpnGatewaysClient->testIamPermissions($project, $region, $resource, $testPermissionsRequestResource);
     * } finally {
     *     $vpnGatewaysClient->close();
     * }
     * ```
     *
     * @param string                 $project                        Project ID for this request.
     * @param string                 $region                         The name of the region for this request.
     * @param string                 $resource                       Name or id of the resource for this request.
     * @param TestPermissionsRequest $testPermissionsRequestResource The body resource for this request
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
    public function testIamPermissions($project, $region, $resource, $testPermissionsRequestResource, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsVpnGatewayRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setResource($resource);
        $request->setTestPermissionsRequestResource($testPermissionsRequestResource);

        return $this->startCall(
            'TestIamPermissions',
            TestPermissionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
