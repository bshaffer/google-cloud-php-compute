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
use Google\Cloud\Compute\V1\AddResourcePoliciesRegionDiskRequest;
use Google\Cloud\Compute\V1\CreateSnapshotRegionDiskRequest;
use Google\Cloud\Compute\V1\DeleteRegionDiskRequest;
use Google\Cloud\Compute\V1\Disk;
use Google\Cloud\Compute\V1\DiskList;
use Google\Cloud\Compute\V1\GetIamPolicyRegionDiskRequest;
use Google\Cloud\Compute\V1\GetRegionDiskRequest;
use Google\Cloud\Compute\V1\InsertRegionDiskRequest;
use Google\Cloud\Compute\V1\ListRegionDisksRequest;
use Google\Cloud\Compute\V1\Operation;
use Google\Cloud\Compute\V1\Policy;
use Google\Cloud\Compute\V1\RegionDisksAddResourcePoliciesRequest;
use Google\Cloud\Compute\V1\RegionDisksRemoveResourcePoliciesRequest;
use Google\Cloud\Compute\V1\RegionDisksResizeRequest;
use Google\Cloud\Compute\V1\RegionSetLabelsRequest;
use Google\Cloud\Compute\V1\RegionSetPolicyRequest;
use Google\Cloud\Compute\V1\RemoveResourcePoliciesRegionDiskRequest;
use Google\Cloud\Compute\V1\ResizeRegionDiskRequest;
use Google\Cloud\Compute\V1\SetIamPolicyRegionDiskRequest;
use Google\Cloud\Compute\V1\SetLabelsRegionDiskRequest;
use Google\Cloud\Compute\V1\Snapshot;
use Google\Cloud\Compute\V1\TestIamPermissionsRegionDiskRequest;
use Google\Cloud\Compute\V1\TestPermissionsRequest;
use Google\Cloud\Compute\V1\TestPermissionsResponse;

/**
 * Service Description: The RegionDisks API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $regionDisksClient = new RegionDisksClient();
 * try {
 *     $disk = '';
 *     $project = '';
 *     $region = '';
 *     $regionDisksAddResourcePoliciesRequestResource = new RegionDisksAddResourcePoliciesRequest();
 *     $response = $regionDisksClient->addResourcePolicies($disk, $project, $region, $regionDisksAddResourcePoliciesRequestResource);
 * } finally {
 *     $regionDisksClient->close();
 * }
 * ```
 *
 * @experimental
 */
class RegionDisksGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.compute.v1.RegionDisks';

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
            'clientConfig' => __DIR__.'/../resources/region_disks_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/region_disks_descriptor_config.php',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/region_disks_rest_client_config.php',
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
     * Adds existing resource policies to a regional disk. You can only add one policy which will be applied to this disk for scheduling snapshot creation.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $regionDisksAddResourcePoliciesRequestResource = new RegionDisksAddResourcePoliciesRequest();
     *     $response = $regionDisksClient->addResourcePolicies($disk, $project, $region, $regionDisksAddResourcePoliciesRequestResource);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string                                $disk                                          The disk name for this request.
     * @param string                                $project                                       Project ID for this request.
     * @param string                                $region                                        The name of the region for this request.
     * @param RegionDisksAddResourcePoliciesRequest $regionDisksAddResourcePoliciesRequestResource The body resource for this request
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
    public function addResourcePolicies($disk, $project, $region, $regionDisksAddResourcePoliciesRequestResource, array $optionalArgs = [])
    {
        $request = new AddResourcePoliciesRegionDiskRequest();
        $request->setDisk($disk);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionDisksAddResourcePoliciesRequestResource($regionDisksAddResourcePoliciesRequestResource);
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
     * Creates a snapshot of this regional disk.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $snapshotResource = new Snapshot();
     *     $response = $regionDisksClient->createSnapshot($disk, $project, $region, $snapshotResource);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string   $disk             Name of the regional persistent disk to snapshot.
     * @param string   $project          Project ID for this request.
     * @param string   $region           Name of the region for this request.
     * @param Snapshot $snapshotResource The body resource for this request
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
    public function createSnapshot($disk, $project, $region, $snapshotResource, array $optionalArgs = [])
    {
        $request = new CreateSnapshotRegionDiskRequest();
        $request->setDisk($disk);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setSnapshotResource($snapshotResource);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        return $this->startCall(
            'CreateSnapshot',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes the specified regional persistent disk. Deleting a regional disk removes all the replicas of its data permanently and is irreversible. However, deleting a disk does not delete any snapshots previously made from the disk. You must separately delete snapshots.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $response = $regionDisksClient->delete($disk, $project, $region);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string $disk         Name of the regional persistent disk to delete.
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
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
    public function delete($disk, $project, $region, array $optionalArgs = [])
    {
        $request = new DeleteRegionDiskRequest();
        $request->setDisk($disk);
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
     * Returns a specified regional persistent disk.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $response = $regionDisksClient->get($disk, $project, $region);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string $disk         Name of the regional persistent disk to return.
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
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
     * @return \Google\Cloud\Compute\V1\Disk
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function get($disk, $project, $region, array $optionalArgs = [])
    {
        $request = new GetRegionDiskRequest();
        $request->setDisk($disk);
        $request->setProject($project);
        $request->setRegion($region);

        return $this->startCall(
            'Get',
            Disk::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the access control policy for a resource. May be empty if no such policy or resource exists.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $resource = '';
     *     $response = $regionDisksClient->getIamPolicy($project, $region, $resource);
     * } finally {
     *     $regionDisksClient->close();
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
        $request = new GetIamPolicyRegionDiskRequest();
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
     * Creates a persistent regional disk in the specified project using the data included in the request.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $diskResource = new Disk();
     *     $project = '';
     *     $region = '';
     *     $response = $regionDisksClient->insert($diskResource, $project, $region);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param Disk   $diskResource The body resource for this request
     * @param string $project      Project ID for this request.
     * @param string $region       Name of the region for this request.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          An optional request ID to identify requests. Specify a unique request ID so that if you must retry your request, the server will know to ignore the request if it has already been completed.
     *
     *          For example, consider a situation where you make an initial request and the request times out. If you make the request again with the same request ID, the server can check if original operation with the same request ID was received, and if so, will ignore the second request. This prevents clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is not supported (00000000-0000-0000-0000-000000000000).
     *     @type string $sourceImage
     *          Optional. Source image to restore onto a disk.
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
    public function insert($diskResource, $project, $region, array $optionalArgs = [])
    {
        $request = new InsertRegionDiskRequest();
        $request->setDiskResource($diskResource);
        $request->setProject($project);
        $request->setRegion($region);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }
        if (isset($optionalArgs['sourceImage'])) {
            $request->setSourceImage($optionalArgs['sourceImage']);
        }

        return $this->startCall(
            'Insert',
            Operation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Retrieves the list of persistent disks contained within the specified region.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $regionDisksClient->list_($project, $region);
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
     *     $pagedResponse = $regionDisksClient->list_($project, $region);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $regionDisksClient->close();
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
        $request = new ListRegionDisksRequest();
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
            DiskList::class,
            $request
        );
    }

    /**
     * Removes resource policies from a regional disk.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $regionDisksRemoveResourcePoliciesRequestResource = new RegionDisksRemoveResourcePoliciesRequest();
     *     $response = $regionDisksClient->removeResourcePolicies($disk, $project, $region, $regionDisksRemoveResourcePoliciesRequestResource);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string                                   $disk                                             The disk name for this request.
     * @param string                                   $project                                          Project ID for this request.
     * @param string                                   $region                                           The name of the region for this request.
     * @param RegionDisksRemoveResourcePoliciesRequest $regionDisksRemoveResourcePoliciesRequestResource The body resource for this request
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
    public function removeResourcePolicies($disk, $project, $region, $regionDisksRemoveResourcePoliciesRequestResource, array $optionalArgs = [])
    {
        $request = new RemoveResourcePoliciesRegionDiskRequest();
        $request->setDisk($disk);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionDisksRemoveResourcePoliciesRequestResource($regionDisksRemoveResourcePoliciesRequestResource);
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
     * Resizes the specified regional persistent disk.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $disk = '';
     *     $project = '';
     *     $region = '';
     *     $regionDisksResizeRequestResource = new RegionDisksResizeRequest();
     *     $response = $regionDisksClient->resize($disk, $project, $region, $regionDisksResizeRequestResource);
     * } finally {
     *     $regionDisksClient->close();
     * }
     * ```
     *
     * @param string                   $disk                             Name of the regional persistent disk.
     * @param string                   $project                          The project ID for this request.
     * @param string                   $region                           Name of the region for this request.
     * @param RegionDisksResizeRequest $regionDisksResizeRequestResource The body resource for this request
     * @param array                    $optionalArgs                     {
     *                                                                   Optional.
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
    public function resize($disk, $project, $region, $regionDisksResizeRequestResource, array $optionalArgs = [])
    {
        $request = new ResizeRegionDiskRequest();
        $request->setDisk($disk);
        $request->setProject($project);
        $request->setRegion($region);
        $request->setRegionDisksResizeRequestResource($regionDisksResizeRequestResource);
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
     * Sets the access control policy on the specified resource. Replaces any existing policy.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $regionSetPolicyRequestResource = new RegionSetPolicyRequest();
     *     $resource = '';
     *     $response = $regionDisksClient->setIamPolicy($project, $region, $regionSetPolicyRequestResource, $resource);
     * } finally {
     *     $regionDisksClient->close();
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
        $request = new SetIamPolicyRegionDiskRequest();
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
     * Sets the labels on the target regional disk.
     *
     * Sample code:
     * ```
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $regionSetLabelsRequestResource = new RegionSetLabelsRequest();
     *     $resource = '';
     *     $response = $regionDisksClient->setLabels($project, $region, $regionSetLabelsRequestResource, $resource);
     * } finally {
     *     $regionDisksClient->close();
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
        $request = new SetLabelsRegionDiskRequest();
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
     * $regionDisksClient = new RegionDisksClient();
     * try {
     *     $project = '';
     *     $region = '';
     *     $resource = '';
     *     $testPermissionsRequestResource = new TestPermissionsRequest();
     *     $response = $regionDisksClient->testIamPermissions($project, $region, $resource, $testPermissionsRequestResource);
     * } finally {
     *     $regionDisksClient->close();
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
        $request = new TestIamPermissionsRegionDiskRequest();
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
