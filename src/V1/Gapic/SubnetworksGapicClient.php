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
use Google\Cloud\Compute\V1\AggregatedListSubnetworksRequest;
use Google\Cloud\Compute\V1\DeleteSubnetworkRequest;
use Google\Cloud\Compute\V1\ExpandIpCidrRangeSubnetworkRequest;
use Google\Cloud\Compute\V1\GetIamPolicySubnetworkRequest;
use Google\Cloud\Compute\V1\GetSubnetworkRequest;
use Google\Cloud\Compute\V1\InsertSubnetworkRequest;
use Google\Cloud\Compute\V1\ListSubnetworksRequest;
use Google\Cloud\Compute\V1\ListUsableSubnetworksRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\PatchSubnetworkRequest;
use Google\Cloud\Compute\V1\Policy;
use Google\Cloud\Compute\V1\RegionSetPolicyRequest;
use Google\Cloud\Compute\V1\SetIamPolicySubnetworkRequest;
use Google\Cloud\Compute\V1\SetPrivateIpGoogleAccessSubnetworkRequest;
use Google\Cloud\Compute\V1\Subnetwork;
use Google\Cloud\Compute\V1\SubnetworkAggregatedList;
use Google\Cloud\Compute\V1\SubnetworkList;
use Google\Cloud\Compute\V1\SubnetworksExpandIpCidrRangeRequest;
use Google\Cloud\Compute\V1\SubnetworksSetPrivateIpGoogleAccessRequest;
use Google\Cloud\Compute\V1\TestIamPermissionsSubnetworkRequest;
use Google\Cloud\Compute\V1\TestPermissionsRequest;
use Google\Cloud\Compute\V1\TestPermissionsResponse;
use Google\Cloud\Compute\V1\UsableSubnetworksAggregatedList;

/**
 * Service Description: The Subnetworks API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $subnetworksClient = new SubnetworksClient();
 * try {
 *     $project = '';
 *     // Iterate over pages of elements
 *     $pagedResponse = $subnetworksClient->aggregatedList($project);
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
 *     $pagedResponse = $subnetworksClient->aggregatedList($project);
 *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $subnetworksClient->close();
 * }
 * ```
 *
 * @experimental
 */
class SubnetworksGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.Subnetworks';

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
            'clientConfig' => __DIR__.'/../resources/subnetworks_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/subnetworks_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/subnetworks_rest_client_config.php',
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
     * Retrieves an aggregated list of subnetworks.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $subnetworksClient->aggregatedList($project);
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
     *     $pagedResponse = $subnetworksClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $subnetworksClient->close();
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
        $request = new AggregatedListSubnetworksRequest();
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
            SubnetworkAggregatedList::class,
            $request
        );
    }

    /**
     * Deletes the specified subnetwork.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetwork = '';
     *     $response = $subnetworksClient->delete($project, $region, $subnetwork);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region scoping this request.
     * @param string $subnetwork   Name of the Subnetwork resource to delete.
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
    public function delete($project, $region, $subnetwork, array $optionalArgs = [])
    {
        $request = new DeleteSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetwork($subnetwork);
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
     * Expands the IP CIDR range of the subnetwork to a specified value.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetwork = '';
     *     $subnetworksExpandIpCidrRangeRequestResource = new SubnetworksExpandIpCidrRangeRequest();
     *     $response = $subnetworksClient->expandIpCidrRange($project, $region, $subnetwork, $subnetworksExpandIpCidrRangeRequestResource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string                              $project                                     Project ID for this request.
     * @param string                              $region                                      Name of the region scoping this request.
     * @param string                              $subnetwork                                  Name of the Subnetwork resource to update.
     * @param SubnetworksExpandIpCidrRangeRequest $subnetworksExpandIpCidrRangeRequestResource The body resource for this request
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
    public function expandIpCidrRange($project, $region, $subnetwork, $subnetworksExpandIpCidrRangeRequestResource, array $optionalArgs = [])
    {
        $request = new ExpandIpCidrRangeSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetwork($subnetwork);
        $request->setSubnetworksExpandIpCidrRangeRequestResource($subnetworksExpandIpCidrRangeRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'ExpandIpCidrRange',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the specified subnetwork. Gets a list of available subnetworks list() request.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetwork = '';
     *     $response = $subnetworksClient->get($project, $region, $subnetwork);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region scoping this request.
     * @param string $subnetwork   Name of the Subnetwork resource to return.
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
     * @return \Google\Cloud\Compute\V1\Subnetwork
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($project, $region, $subnetwork, array $optionalArgs = [])
    {
        $request = new GetSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetwork($subnetwork);

        return $this->startCall(
            'Get',
            Subnetwork::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the access control policy for a resource. May be empty if no such policy or resource exists.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $resource = '';
     *     $response = $subnetworksClient->getIamPolicy($project, $region, $resource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
     * @param string $region       The name of the region for this request.
     * @param string $resource     Name or id of the resource for this request.
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
    public function getIamPolicy($project, $region, $resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicySubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setResource($resource);
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
     * Creates a subnetwork in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetworkResource = new Subnetwork();
     *     $response = $subnetworksClient->insert($project, $region, $subnetworkResource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string     $project            Project ID for this request.
     * @param string     $region             Name of the region scoping this request.
     * @param Subnetwork $subnetworkResource The body resource for this request
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
    public function insert($project, $region, $subnetworkResource, array $optionalArgs = [])
    {
        $request = new InsertSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetworkResource($subnetworkResource);
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
     * Retrieves a list of subnetworks available to the specified project.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $subnetworksClient->list_($project, $region);
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
     *     $pagedResponse = $subnetworksClient->list_($project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $subnetworksClient->close();
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
        $request = new ListSubnetworksRequest();
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
            SubnetworkList::class,
            $request
        );
    }

    /**
     * Retrieves an aggregated list of all usable subnetworks in the project.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $subnetworksClient->listUsable($project);
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
     *     $pagedResponse = $subnetworksClient->listUsable($project);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $subnetworksClient->close();
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
    public function listUsable($project, array $optionalArgs = [])
    {
        $request = new ListUsableSubnetworksRequest();
        $request->setProject($project);
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
            'ListUsable',
            $optionalArgs,
            UsableSubnetworksAggregatedList::class,
            $request
        );
    }

    /**
     * Patches the specified subnetwork with the data included in the request. Only certain fields can be updated with a patch request as indicated in the field descriptions. You must specify the current fingerprint of the subnetwork resource being patched.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetwork = '';
     *     $subnetworkResource = new Subnetwork();
     *     $response = $subnetworksClient->patch($project, $region, $subnetwork, $subnetworkResource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string     $project            Project ID for this request.
     * @param string     $region             Name of the region scoping this request.
     * @param string     $subnetwork         Name of the Subnetwork resource to patch.
     * @param Subnetwork $subnetworkResource The body resource for this request
     * @param array      $optionalArgs       {
     *                                       Optional.
     *
     *     @type int $drainTimeoutSeconds
     *          The drain timeout specifies the upper bound in seconds on the amount of time allowed to drain connections from the current ACTIVE subnetwork to the current BACKUP subnetwork. The drain timeout is only applicable when the following conditions are true: - the subnetwork being patched has purpose = INTERNAL_HTTPS_LOAD_BALANCER - the subnetwork being patched has role = BACKUP - the patch request is setting the role to ACTIVE. Note that after this patch operation the roles of the ACTIVE and BACKUP subnetworks will be swapped.
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
    public function patch($project, $region, $subnetwork, $subnetworkResource, array $optionalArgs = [])
    {
        $request = new PatchSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetwork($subnetwork);
        $request->setSubnetworkResource($subnetworkResource);
        if (isset($optionalArgs['drainTimeoutSeconds'])) {
            $request->setDrainTimeoutSeconds($optionalArgs['drainTimeoutSeconds']);
        }
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
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $regionSetPolicyRequestResource = new RegionSetPolicyRequest();
     *     $resource = '';
     *     $response = $subnetworksClient->setIamPolicy($project, $region, $regionSetPolicyRequestResource, $resource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string                 $project                        Project ID for this request.
     * @param string                 $region                         The name of the region for this request.
     * @param RegionSetPolicyRequest $regionSetPolicyRequestResource The body resource for this request
     * @param string                 $resource                       Name or id of the resource for this request.
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
     * @return \Google\Cloud\Compute\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setIamPolicy($project, $region, $regionSetPolicyRequestResource, $resource, array $optionalArgs = [])
    {
        $request = new SetIamPolicySubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionSetPolicyRequestResource($regionSetPolicyRequestResource);
        $request->setResource($resource);

        return $this->startCall(
            'SetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Set whether VMs in this subnet can access Google services without assigning external IP addresses through Private Google Access.
     *
     * Sample code:
     * ```
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $subnetwork = '';
     *     $subnetworksSetPrivateIpGoogleAccessRequestResource = new SubnetworksSetPrivateIpGoogleAccessRequest();
     *     $response = $subnetworksClient->setPrivateIpGoogleAccess($project, $region, $subnetwork, $subnetworksSetPrivateIpGoogleAccessRequestResource);
     * } finally {
     *     $subnetworksClient->close();
     * }
     * ```
     *
     * @param string                                     $project                                            Project ID for this request.
     * @param string                                     $region                                             Name of the region scoping this request.
     * @param string                                     $subnetwork                                         Name of the Subnetwork resource.
     * @param SubnetworksSetPrivateIpGoogleAccessRequest $subnetworksSetPrivateIpGoogleAccessRequestResource The body resource for this request
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
    public function setPrivateIpGoogleAccess($project, $region, $subnetwork, $subnetworksSetPrivateIpGoogleAccessRequestResource, array $optionalArgs = [])
    {
        $request = new SetPrivateIpGoogleAccessSubnetworkRequest();
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSubnetwork($subnetwork);
        $request->setSubnetworksSetPrivateIpGoogleAccessRequestResource($subnetworksSetPrivateIpGoogleAccessRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetPrivateIpGoogleAccess',
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
     * $subnetworksClient = new SubnetworksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $resource = '';
     *     $testPermissionsRequestResource = new TestPermissionsRequest();
     *     $response = $subnetworksClient->testIamPermissions($project, $region, $resource, $testPermissionsRequestResource);
     * } finally {
     *     $subnetworksClient->close();
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
        $request = new TestIamPermissionsSubnetworkRequest();
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
