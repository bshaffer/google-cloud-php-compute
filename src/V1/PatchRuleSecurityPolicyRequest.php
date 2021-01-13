<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request message for SecurityPolicies.PatchRule. See the method description for details.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.PatchRuleSecurityPolicyRequest</code>
 */
class PatchRuleSecurityPolicyRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The priority of the rule to patch.
     *
     * Generated from protobuf field <code>int32 priority = 176716196;</code>
     */
    private $priority = 0;
    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $project = '';
    /**
     * Name of the security policy to update.
     *
     * Generated from protobuf field <code>string security_policy = 171082513 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $security_policy = '';
    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.SecurityPolicyRule security_policy_rule_resource = 134257987 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $security_policy_rule_resource = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $priority
     *           The priority of the rule to patch.
     *     @type string $project
     *           Project ID for this request.
     *     @type string $security_policy
     *           Name of the security policy to update.
     *     @type \Google\Cloud\Compute\V1\SecurityPolicyRule $security_policy_rule_resource
     *           The body resource for this request
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The priority of the rule to patch.
     *
     * Generated from protobuf field <code>int32 priority = 176716196;</code>
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * The priority of the rule to patch.
     *
     * Generated from protobuf field <code>int32 priority = 176716196;</code>
     * @param int $var
     * @return $this
     */
    public function setPriority($var)
    {
        GPBUtil::checkInt32($var);
        $this->priority = $var;

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
     * Name of the security policy to update.
     *
     * Generated from protobuf field <code>string security_policy = 171082513 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getSecurityPolicy()
    {
        return $this->security_policy;
    }

    /**
     * Name of the security policy to update.
     *
     * Generated from protobuf field <code>string security_policy = 171082513 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setSecurityPolicy($var)
    {
        GPBUtil::checkString($var, True);
        $this->security_policy = $var;

        return $this;
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.SecurityPolicyRule security_policy_rule_resource = 134257987 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Compute\V1\SecurityPolicyRule
     */
    public function getSecurityPolicyRuleResource()
    {
        return isset($this->security_policy_rule_resource) ? $this->security_policy_rule_resource : null;
    }

    public function hasSecurityPolicyRuleResource()
    {
        return isset($this->security_policy_rule_resource);
    }

    public function clearSecurityPolicyRuleResource()
    {
        unset($this->security_policy_rule_resource);
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.SecurityPolicyRule security_policy_rule_resource = 134257987 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Compute\V1\SecurityPolicyRule $var
     * @return $this
     */
    public function setSecurityPolicyRuleResource($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\SecurityPolicyRule::class);
        $this->security_policy_rule_resource = $var;

        return $this;
    }

}

