<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request message for RegionNotificationEndpoints.Get. See the method description for details.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.GetRegionNotificationEndpointRequest</code>
 */
class GetRegionNotificationEndpointRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Name of the NotificationEndpoint resource to return.
     *
     * Generated from protobuf field <code>string notification_endpoint = 108371561 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $notification_endpoint = '';
    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $project = '';
    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $region = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $notification_endpoint
     *           Name of the NotificationEndpoint resource to return.
     *     @type string $project
     *           Project ID for this request.
     *     @type string $region
     *           Name of the region scoping this request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Name of the NotificationEndpoint resource to return.
     *
     * Generated from protobuf field <code>string notification_endpoint = 108371561 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getNotificationEndpoint()
    {
        return $this->notification_endpoint;
    }

    /**
     * Name of the NotificationEndpoint resource to return.
     *
     * Generated from protobuf field <code>string notification_endpoint = 108371561 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setNotificationEndpoint($var)
    {
        GPBUtil::checkString($var, True);
        $this->notification_endpoint = $var;

        return $this;
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProject($var)
    {
        GPBUtil::checkString($var, True);
        $this->project = $var;

        return $this;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        GPBUtil::checkString($var, True);
        $this->region = $var;

        return $this;
    }

}

