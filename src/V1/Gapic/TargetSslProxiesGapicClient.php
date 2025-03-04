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
use Google\Cloud\Compute\V1\DeleteTargetSslProxyRequest;
use Google\Cloud\Compute\V1\GetTargetSslProxyRequest;
use Google\Cloud\Compute\V1\InsertTargetSslProxyRequest;
use Google\Cloud\Compute\V1\ListTargetSslProxiesRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\SetBackendServiceTargetSslProxyRequest;
use Google\Cloud\Compute\V1\SetProxyHeaderTargetSslProxyRequest;
use Google\Cloud\Compute\V1\SetSslCertificatesTargetSslProxyRequest;
use Google\Cloud\Compute\V1\SetSslPolicyTargetSslProxyRequest;
use Google\Cloud\Compute\V1\SslPolicyReference;
use Google\Cloud\Compute\V1\TargetSslProxiesSetBackendServiceRequest;
use Google\Cloud\Compute\V1\TargetSslProxiesSetProxyHeaderRequest;
use Google\Cloud\Compute\V1\TargetSslProxiesSetSslCertificatesRequest;
use Google\Cloud\Compute\V1\TargetSslProxy;
use Google\Cloud\Compute\V1\TargetSslProxyList;

/**
 * Service Description: The TargetSslProxies API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $targetSslProxiesClient = new TargetSslProxiesClient();
 * try {
 *     $project = '';
 *     $targetSslProxy = '';
 *     $response = $targetSslProxiesClient->delete($project, $targetSslProxy);
 * } finally {
 *     $targetSslProxiesClient->close();
 * }
 * ```
 *
 * @experimental
 */
class TargetSslProxiesGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.TargetSslProxies';

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
            'clientConfig' => __DIR__.'/../resources/target_ssl_proxies_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/target_ssl_proxies_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/target_ssl_proxies_rest_client_config.php',
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
     * Deletes the specified TargetSslProxy resource.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->delete($project, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string $project        Project ID for this request.
     * @param string $targetSslProxy Name of the TargetSslProxy resource to delete.
     * @param array  $optionalArgs   {
     *                               Optional.
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
    public function delete($project, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new DeleteTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxy($targetSslProxy);
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
     * Returns the specified TargetSslProxy resource. Gets a list of available target SSL proxies by making a list() request.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->get($project, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string $project        Project ID for this request.
     * @param string $targetSslProxy Name of the TargetSslProxy resource to return.
     * @param array  $optionalArgs   {
     *                               Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Compute\V1\TargetSslProxy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($project, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new GetTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxy($targetSslProxy);

        return $this->startCall(
            'Get',
            TargetSslProxy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a TargetSslProxy resource in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxyResource = new TargetSslProxy();
     *     $response = $targetSslProxiesClient->insert($project, $targetSslProxyResource);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string         $project                Project ID for this request.
     * @param TargetSslProxy $targetSslProxyResource The body resource for this request
     * @param array          $optionalArgs           {
     *                                               Optional.
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
    public function insert($project, $targetSslProxyResource, array $optionalArgs = [])
    {
        $request = new InsertTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxyResource($targetSslProxyResource);
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
     * Retrieves the list of TargetSslProxy resources available to the specified project.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $targetSslProxiesClient->list_($project);
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
     *     $pagedResponse = $targetSslProxiesClient->list_($project);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $targetSslProxiesClient->close();
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
        $request = new ListTargetSslProxiesRequest();
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
            TargetSslProxyList::class,
            $request
        );
    }

    /**
     * Changes the BackendService for TargetSslProxy.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxiesSetBackendServiceRequestResource = new TargetSslProxiesSetBackendServiceRequest();
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->setBackendService($project, $targetSslProxiesSetBackendServiceRequestResource, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string                                   $project                                          Project ID for this request.
     * @param TargetSslProxiesSetBackendServiceRequest $targetSslProxiesSetBackendServiceRequestResource The body resource for this request
     * @param string                                   $targetSslProxy                                   Name of the TargetSslProxy resource whose BackendService resource is to be set.
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
    public function setBackendService($project, $targetSslProxiesSetBackendServiceRequestResource, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new SetBackendServiceTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxiesSetBackendServiceRequestResource($targetSslProxiesSetBackendServiceRequestResource);
        $request->setTargetSslProxy($targetSslProxy);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetBackendService',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes the ProxyHeaderType for TargetSslProxy.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxiesSetProxyHeaderRequestResource = new TargetSslProxiesSetProxyHeaderRequest();
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->setProxyHeader($project, $targetSslProxiesSetProxyHeaderRequestResource, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string                                $project                                       Project ID for this request.
     * @param TargetSslProxiesSetProxyHeaderRequest $targetSslProxiesSetProxyHeaderRequestResource The body resource for this request
     * @param string                                $targetSslProxy                                Name of the TargetSslProxy resource whose ProxyHeader is to be set.
     * @param array                                 $optionalArgs                                  {
     *                                                                                             Optional.
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
    public function setProxyHeader($project, $targetSslProxiesSetProxyHeaderRequestResource, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new SetProxyHeaderTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxiesSetProxyHeaderRequestResource($targetSslProxiesSetProxyHeaderRequestResource);
        $request->setTargetSslProxy($targetSslProxy);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetProxyHeader',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Changes SslCertificates for TargetSslProxy.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $targetSslProxiesSetSslCertificatesRequestResource = new TargetSslProxiesSetSslCertificatesRequest();
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->setSslCertificates($project, $targetSslProxiesSetSslCertificatesRequestResource, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string                                    $project                                           Project ID for this request.
     * @param TargetSslProxiesSetSslCertificatesRequest $targetSslProxiesSetSslCertificatesRequestResource The body resource for this request
     * @param string                                    $targetSslProxy                                    Name of the TargetSslProxy resource whose SslCertificate resource is to be set.
     * @param array                                     $optionalArgs                                      {
     *                                                                                                     Optional.
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
    public function setSslCertificates($project, $targetSslProxiesSetSslCertificatesRequestResource, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new SetSslCertificatesTargetSslProxyRequest();
        $request->setProject($project);
        $request->setTargetSslProxiesSetSslCertificatesRequestResource($targetSslProxiesSetSslCertificatesRequestResource);
        $request->setTargetSslProxy($targetSslProxy);
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
     * Sets the SSL policy for TargetSslProxy. The SSL policy specifies the server-side support for SSL features. This affects connections between clients and the SSL proxy load balancer. They do not affect the connection between the load balancer and the backends.
     *
     * Sample code:
     * ```
     * $targetSslProxiesClient = new TargetSslProxiesClient();
     * try {
     *     $project = '';
     *     $sslPolicyReferenceResource = new SslPolicyReference();
     *     $targetSslProxy = '';
     *     $response = $targetSslProxiesClient->setSslPolicy($project, $sslPolicyReferenceResource, $targetSslProxy);
     * } finally {
     *     $targetSslProxiesClient->close();
     * }
     * ```
     *
     * @param string             $project                    Project ID for this request.
     * @param SslPolicyReference $sslPolicyReferenceResource The body resource for this request
     * @param string             $targetSslProxy             Name of the TargetSslProxy resource whose SSL policy is to be set. The name must be 1-63 characters long, and comply with RFC1035.
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
    public function setSslPolicy($project, $sslPolicyReferenceResource, $targetSslProxy, array $optionalArgs = [])
    {
        $request = new SetSslPolicyTargetSslProxyRequest();
        $request->setProject($project);
        $request->setSslPolicyReferenceResource($sslPolicyReferenceResource);
        $request->setTargetSslProxy($targetSslProxy);
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
}
