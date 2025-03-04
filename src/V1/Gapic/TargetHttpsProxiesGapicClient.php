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
use Google\Cloud\Compute\V1\AggregatedListTargetHttpsProxiesRequest;
use Google\Cloud\Compute\V1\DeleteTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\GetTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\InsertTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\ListTargetHttpsProxiesRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\SetQuicOverrideTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\SetSslCertificatesTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\SetSslPolicyTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\SetUrlMapTargetHttpsProxyRequest;
use Google\Cloud\Compute\V1\SslPolicyReference;
use Google\Cloud\Compute\V1\TargetHttpsProxiesSetQuicOverrideRequest;
use Google\Cloud\Compute\V1\TargetHttpsProxiesSetSslCertificatesRequest;
use Google\Cloud\Compute\V1\TargetHttpsProxy;
use Google\Cloud\Compute\V1\TargetHttpsProxyAggregatedList;
use Google\Cloud\Compute\V1\TargetHttpsProxyList;
use Google\Cloud\Compute\V1\UrlMapReference;

/**
 * Service Description: The TargetHttpsProxies API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
 * try {
 *     $project = '';
 *     // Iterate over pages of elements
 *     $pagedResponse = $targetHttpsProxiesClient->aggregatedList($project);
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
 *     $pagedResponse = $targetHttpsProxiesClient->aggregatedList($project);
 *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $targetHttpsProxiesClient->close();
 * }
 * ```
 *
 * @experimental
 */
class TargetHttpsProxiesGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.TargetHttpsProxies';

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
            'clientConfig' => __DIR__.'/../resources/target_https_proxies_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/target_https_proxies_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/target_https_proxies_rest_client_config.php',
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
     * Retrieves the list of all TargetHttpsProxy resources, regional and global, available to the specified project.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $targetHttpsProxiesClient->aggregatedList($project);
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
     *     $pagedResponse = $targetHttpsProxiesClient->aggregatedList($project);
     *     foreach ($pagedResponse->iterateAllElements() as $key => $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string $project      Name of the project scoping this request.
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
        $request = new AggregatedListTargetHttpsProxiesRequest();
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
            TargetHttpsProxyAggregatedList::class,
            $request
        );
    }

    /**
     * Deletes the specified TargetHttpsProxy resource.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxy = '';
     *     $response = $targetHttpsProxiesClient->delete($project, $targetHttpsProxy);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string $project          Project ID for this request.
     * @param string $targetHttpsProxy Name of the TargetHttpsProxy resource to delete.
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
    public function delete($project, $targetHttpsProxy, array $optionalArgs = [])
    {
        $request = new DeleteTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxy($targetHttpsProxy);
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
     * Returns the specified TargetHttpsProxy resource. Gets a list of available target HTTPS proxies by making a list() request.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxy = '';
     *     $response = $targetHttpsProxiesClient->get($project, $targetHttpsProxy);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string $project          Project ID for this request.
     * @param string $targetHttpsProxy Name of the TargetHttpsProxy resource to return.
     * @param array  $optionalArgs     {
     *                                 Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\TargetHttpsProxy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($project, $targetHttpsProxy, array $optionalArgs = [])
    {
        $request = new GetTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxy($targetHttpsProxy);

        return $this->startCall(
            'Get',
            TargetHttpsProxy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a TargetHttpsProxy resource in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxyResource = new TargetHttpsProxy();
     *     $response = $targetHttpsProxiesClient->insert($project, $targetHttpsProxyResource);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string           $project                  Project ID for this request.
     * @param TargetHttpsProxy $targetHttpsProxyResource The body resource for this request
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
    public function insert($project, $targetHttpsProxyResource, array $optionalArgs = [])
    {
        $request = new InsertTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxyResource($targetHttpsProxyResource);
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
     * Retrieves the list of TargetHttpsProxy resources available to the specified project.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $targetHttpsProxiesClient->list_($project);
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
     *     $pagedResponse = $targetHttpsProxiesClient->list_($project);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $targetHttpsProxiesClient->close();
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
    public function list_($project, array $optionalArgs = [])
    {
        $request = new ListTargetHttpsProxiesRequest();
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
            'List',
            $optionalArgs,
            TargetHttpsProxyList::class,
            $request
        );
    }

    /**
     * Sets the QUIC override policy for TargetHttpsProxy.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxiesSetQuicOverrideRequestResource = new TargetHttpsProxiesSetQuicOverrideRequest();
     *     $targetHttpsProxy = '';
     *     $response = $targetHttpsProxiesClient->setQuicOverride($project, $targetHttpsProxiesSetQuicOverrideRequestResource, $targetHttpsProxy);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string                                   $project                                          Project ID for this request.
     * @param TargetHttpsProxiesSetQuicOverrideRequest $targetHttpsProxiesSetQuicOverrideRequestResource The body resource for this request
     * @param string                                   $targetHttpsProxy                                 Name of the TargetHttpsProxy resource to set the QUIC override policy for. The name should conform to RFC1035.
     * @param array                                    $optionalArgs                                     {
     *                                                                                                   Optional.
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
    public function setQuicOverride($project, $targetHttpsProxiesSetQuicOverrideRequestResource, $targetHttpsProxy, array $optionalArgs = [])
    {
        $request = new SetQuicOverrideTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxiesSetQuicOverrideRequestResource($targetHttpsProxiesSetQuicOverrideRequestResource);
        $request->setTargetHttpsProxy($targetHttpsProxy);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetQuicOverride',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Replaces SslCertificates for TargetHttpsProxy.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxiesSetSslCertificatesRequestResource = new TargetHttpsProxiesSetSslCertificatesRequest();
     *     $targetHttpsProxy = '';
     *     $response = $targetHttpsProxiesClient->setSslCertificates($project, $targetHttpsProxiesSetSslCertificatesRequestResource, $targetHttpsProxy);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string                                      $project                                             Project ID for this request.
     * @param TargetHttpsProxiesSetSslCertificatesRequest $targetHttpsProxiesSetSslCertificatesRequestResource The body resource for this request
     * @param string                                      $targetHttpsProxy                                    Name of the TargetHttpsProxy resource to set an SslCertificates resource for.
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
    public function setSslCertificates($project, $targetHttpsProxiesSetSslCertificatesRequestResource, $targetHttpsProxy, array $optionalArgs = [])
    {
        $request = new SetSslCertificatesTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxiesSetSslCertificatesRequestResource($targetHttpsProxiesSetSslCertificatesRequestResource);
        $request->setTargetHttpsProxy($targetHttpsProxy);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetSslCertificates',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the SSL policy for TargetHttpsProxy. The SSL policy specifies the server-side support for SSL features. This affects connections between clients and the HTTPS proxy load balancer. They do not affect the connection between the load balancer and the backends.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $sslPolicyReferenceResource = new SslPolicyReference();
     *     $targetHttpsProxy = '';
     *     $response = $targetHttpsProxiesClient->setSslPolicy($project, $sslPolicyReferenceResource, $targetHttpsProxy);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string             $project                    Project ID for this request.
     * @param SslPolicyReference $sslPolicyReferenceResource The body resource for this request
     * @param string             $targetHttpsProxy           Name of the TargetHttpsProxy resource whose SSL policy is to be set. The name must be 1-63 characters long, and comply with RFC1035.
     * @param array              $optionalArgs               {
     *                                                       Optional.
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
    public function setSslPolicy($project, $sslPolicyReferenceResource, $targetHttpsProxy, array $optionalArgs = [])
    {
        $request = new SetSslPolicyTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setSslPolicyReferenceResource($sslPolicyReferenceResource);
        $request->setTargetHttpsProxy($targetHttpsProxy);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetSslPolicy',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the URL map for TargetHttpsProxy.
     *
     * Sample code:
     * ```
     * $targetHttpsProxiesClient = new TargetHttpsProxiesClient();
     * try {
     *     $project = '';
     *     $targetHttpsProxy = '';
     *     $urlMapReferenceResource = new UrlMapReference();
     *     $response = $targetHttpsProxiesClient->setUrlMap($project, $targetHttpsProxy, $urlMapReferenceResource);
     * } finally {
     *     $targetHttpsProxiesClient->close();
     * }
     * ```
     *
     * @param string          $project                 Project ID for this request.
     * @param string          $targetHttpsProxy        Name of the TargetHttpsProxy resource whose URL map is to be set.
     * @param UrlMapReference $urlMapReferenceResource The body resource for this request
     * @param array           $optionalArgs            {
     *                                                 Optional.
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
    public function setUrlMap($project, $targetHttpsProxy, $urlMapReferenceResource, array $optionalArgs = [])
    {
        $request = new SetUrlMapTargetHttpsProxyRequest();
        $request->setProject($project);
        $request->setTargetHttpsProxy($targetHttpsProxy);
        $request->setUrlMapReferenceResource($urlMapReferenceResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetUrlMap',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
