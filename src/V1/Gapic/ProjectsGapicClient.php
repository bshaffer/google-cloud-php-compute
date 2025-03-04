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
use Google\Cloud\Compute\V1\DisableXpnHostProjectRequest;
use Google\Cloud\Compute\V1\DisableXpnResourceProjectRequest;
use Google\Cloud\Compute\V1\DiskMoveRequest;
use Google\Cloud\Compute\V1\EnableXpnHostProjectRequest;
use Google\Cloud\Compute\V1\EnableXpnResourceProjectRequest;
use Google\Cloud\Compute\V1\GetProjectRequest;
use Google\Cloud\Compute\V1\GetXpnHostProjectRequest;
use Google\Cloud\Compute\V1\GetXpnResourcesProjectsRequest;
use Google\Cloud\Compute\V1\InstanceMoveRequest;
use Google\Cloud\Compute\V1\ListXpnHostsProjectsRequest;
use Google\Cloud\Compute\V1\Metadata;
use Google\Cloud\Compute\V1\MoveDiskProjectRequest;
use Google\Cloud\Compute\V1\MoveInstanceProjectRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\Project;
use Google\Cloud\Compute\V1\ProjectsDisableXpnResourceRequest;
use Google\Cloud\Compute\V1\ProjectsEnableXpnResourceRequest;
use Google\Cloud\Compute\V1\ProjectsGetXpnResources;
use Google\Cloud\Compute\V1\ProjectsListXpnHostsRequest;
use Google\Cloud\Compute\V1\ProjectsSetDefaultNetworkTierRequest;
use Google\Cloud\Compute\V1\SetCommonInstanceMetadataProjectRequest;
use Google\Cloud\Compute\V1\SetDefaultNetworkTierProjectRequest;
use Google\Cloud\Compute\V1\SetUsageExportBucketProjectRequest;
use Google\Cloud\Compute\V1\UsageExportLocation;
use Google\Cloud\Compute\V1\XpnHostList;

/**
 * Service Description: The Projects API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $projectsClient = new ProjectsClient();
 * try {
 *     $project = '';
 *     $response = $projectsClient->disableXpnHost($project);
 * } finally {
 *     $projectsClient->close();
 * }
 * ```
 *
 * @experimental
 */
class ProjectsGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.Projects';

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
            'clientConfig' => __DIR__.'/../resources/projects_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/projects_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/projects_rest_client_config.php',
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
     * Disable this project as a shared VPC host project.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $response = $projectsClient->disableXpnHost($project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
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
    public function disableXpnHost($project, array $optionalArgs = [])
    {
        $request = new DisableXpnHostProjectRequest();
        $request->setProject($project);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DisableXpnHost',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Disable a service resource (also known as service project) associated with this host project.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $projectsDisableXpnResourceRequestResource = new ProjectsDisableXpnResourceRequest();
     *     $response = $projectsClient->disableXpnResource($project, $projectsDisableXpnResourceRequestResource);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string                            $project                                   Project ID for this request.
     * @param ProjectsDisableXpnResourceRequest $projectsDisableXpnResourceRequestResource The body resource for this request
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
    public function disableXpnResource($project, $projectsDisableXpnResourceRequestResource, array $optionalArgs = [])
    {
        $request = new DisableXpnResourceProjectRequest();
        $request->setProject($project);
        $request->setProjectsDisableXpnResourceRequestResource($projectsDisableXpnResourceRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'DisableXpnResource',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Enable this project as a shared VPC host project.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $response = $projectsClient->enableXpnHost($project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
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
    public function enableXpnHost($project, array $optionalArgs = [])
    {
        $request = new EnableXpnHostProjectRequest();
        $request->setProject($project);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'EnableXpnHost',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Enable service resource (a.k.a service project) for a host project, so that subnets in the host project can be used by instances in the service project.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $projectsEnableXpnResourceRequestResource = new ProjectsEnableXpnResourceRequest();
     *     $response = $projectsClient->enableXpnResource($project, $projectsEnableXpnResourceRequestResource);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string                           $project                                  Project ID for this request.
     * @param ProjectsEnableXpnResourceRequest $projectsEnableXpnResourceRequestResource The body resource for this request
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
    public function enableXpnResource($project, $projectsEnableXpnResourceRequestResource, array $optionalArgs = [])
    {
        $request = new EnableXpnResourceProjectRequest();
        $request->setProject($project);
        $request->setProjectsEnableXpnResourceRequestResource($projectsEnableXpnResourceRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'EnableXpnResource',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the specified Project resource.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $response = $projectsClient->get($project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
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
     * @return \Google\Cloud\Compute\V1\Project
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($project, array $optionalArgs = [])
    {
        $request = new GetProjectRequest();
        $request->setProject($project);

        return $this->startCall(
            'Get',
            Project::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the shared VPC host project that this project links to. May be empty if no link exists.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $response = $projectsClient->getXpnHost($project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string $project      Project ID for this request.
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
     * @return \Google\Cloud\Compute\V1\Project
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getXpnHost($project, array $optionalArgs = [])
    {
        $request = new GetXpnHostProjectRequest();
        $request->setProject($project);

        return $this->startCall(
            'GetXpnHost',
            Project::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets service resources (a.k.a service project) associated with this host project.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $projectsClient->getXpnResources($project);
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
     *     $pagedResponse = $projectsClient->getXpnResources($project);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $projectsClient->close();
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
    public function getXpnResources($project, array $optionalArgs = [])
    {
        $request = new GetXpnResourcesProjectsRequest();
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
            'GetXpnResources',
            $optionalArgs,
            ProjectsGetXpnResources::class,
            $request
        );
    }

    /**
     * Lists all shared VPC host projects visible to the user in an organization.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $projectsListXpnHostsRequestResource = new ProjectsListXpnHostsRequest();
     *     // Iterate over pages of elements
     *     $pagedResponse = $projectsClient->listXpnHosts($project, $projectsListXpnHostsRequestResource);
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
     *     $pagedResponse = $projectsClient->listXpnHosts($project, $projectsListXpnHostsRequestResource);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string                      $project                             Project ID for this request.
     * @param ProjectsListXpnHostsRequest $projectsListXpnHostsRequestResource The body resource for this request
     * @param array                       $optionalArgs                        {
     *                                                                         Optional.
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
    public function listXpnHosts($project, $projectsListXpnHostsRequestResource, array $optionalArgs = [])
    {
        $request = new ListXpnHostsProjectsRequest();
        $request->setProject($project);
        $request->setProjectsListXpnHostsRequestResource($projectsListXpnHostsRequestResource);
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
            'ListXpnHosts',
            $optionalArgs,
            XpnHostList::class,
            $request
        );
    }

    /**
     * Moves a persistent disk from one zone to another.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $diskMoveRequestResource = new DiskMoveRequest();
     *     $project = '';
     *     $response = $projectsClient->moveDisk($diskMoveRequestResource, $project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param DiskMoveRequest $diskMoveRequestResource The body resource for this request
     * @param string          $project                 Project ID for this request.
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
    public function moveDisk($diskMoveRequestResource, $project, array $optionalArgs = [])
    {
        $request = new MoveDiskProjectRequest();
        $request->setDiskMoveRequestResource($diskMoveRequestResource);
        $request->setProject($project);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'MoveDisk',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Moves an instance and its attached persistent disks from one zone to another.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $instanceMoveRequestResource = new InstanceMoveRequest();
     *     $project = '';
     *     $response = $projectsClient->moveInstance($instanceMoveRequestResource, $project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param InstanceMoveRequest $instanceMoveRequestResource The body resource for this request
     * @param string              $project                     Project ID for this request.
     * @param array               $optionalArgs                {
     *                                                         Optional.
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
    public function moveInstance($instanceMoveRequestResource, $project, array $optionalArgs = [])
    {
        $request = new MoveInstanceProjectRequest();
        $request->setInstanceMoveRequestResource($instanceMoveRequestResource);
        $request->setProject($project);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'MoveInstance',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets metadata common to all instances within the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $metadataResource = new Metadata();
     *     $project = '';
     *     $response = $projectsClient->setCommonInstanceMetadata($metadataResource, $project);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param Metadata $metadataResource The body resource for this request
     * @param string   $project          Project ID for this request.
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
    public function setCommonInstanceMetadata($metadataResource, $project, array $optionalArgs = [])
    {
        $request = new SetCommonInstanceMetadataProjectRequest();
        $request->setMetadataResource($metadataResource);
        $request->setProject($project);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetCommonInstanceMetadata',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the default network tier of the project. The default network tier is used when an address/forwardingRule/instance is created without specifying the network tier field.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $projectsSetDefaultNetworkTierRequestResource = new ProjectsSetDefaultNetworkTierRequest();
     *     $response = $projectsClient->setDefaultNetworkTier($project, $projectsSetDefaultNetworkTierRequestResource);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string                               $project                                      Project ID for this request.
     * @param ProjectsSetDefaultNetworkTierRequest $projectsSetDefaultNetworkTierRequestResource The body resource for this request
     * @param array                                $optionalArgs                                 {
     *                                                                                           Optional.
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
    public function setDefaultNetworkTier($project, $projectsSetDefaultNetworkTierRequestResource, array $optionalArgs = [])
    {
        $request = new SetDefaultNetworkTierProjectRequest();
        $request->setProject($project);
        $request->setProjectsSetDefaultNetworkTierRequestResource($projectsSetDefaultNetworkTierRequestResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetDefaultNetworkTier',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Enables the usage export feature and sets the usage export bucket where reports are stored. If you provide an empty request body using this method, the usage export feature will be disabled.
     *
     * Sample code:
     * ```
     * $projectsClient = new ProjectsClient();
     * try {
     *     $project = '';
     *     $usageExportLocationResource = new UsageExportLocation();
     *     $response = $projectsClient->setUsageExportBucket($project, $usageExportLocationResource);
     * } finally {
     *     $projectsClient->close();
     * }
     * ```
     *
     * @param string              $project                     Project ID for this request.
     * @param UsageExportLocation $usageExportLocationResource The body resource for this request
     * @param array               $optionalArgs                {
     *                                                         Optional.
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
    public function setUsageExportBucket($project, $usageExportLocationResource, array $optionalArgs = [])
    {
        $request = new SetUsageExportBucketProjectRequest();
        $request->setProject($project);
        $request->setUsageExportLocationResource($usageExportLocationResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'SetUsageExportBucket',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
