<?php
/**
 * NewEmployeeAllOf
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * PHP Point Of Sale API
 *
 * PHP Point Of Sale API  You can find out more about PHP POS at [https://phppointofsale.com](https://phppointofsale.com)
 *
 * The version of the OpenAPI document: 1.0
 * Contact: support@phppointofsale.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.1.2
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * NewEmployeeAllOf Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NewEmployeeAllOf implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'NewEmployee_allOf';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'username' => 'string',
        'password' => 'string',
        'inactive' => 'bool',
        'reason_inactive' => 'string',
        'hire_date' => '\DateTime',
        'employee_number' => 'string',
        'birthday' => '\DateTime',
        'login_start_time' => '\DateTime',
        'login_end_time' => '\DateTime',
        'termination_date' => '\DateTime',
        'force_password_change' => 'bool',
        'always_require_password' => 'bool',
        'not_required_to_clock_in' => 'bool',
        'commission_percent' => 'float',
        'commission_percent_type' => 'string',
        'hourly_pay_rate' => 'float',
        'default_register_id' => 'int',
        'language' => 'string',
        'locations' => 'int[]',
        'permissions' => 'map[string,string[]]',
        'permissions_location' => 'map[string,\OpenAPI\Client\Model\LocationPermissions]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'username' => null,
        'password' => null,
        'inactive' => null,
        'reason_inactive' => null,
        'hire_date' => 'date',
        'employee_number' => null,
        'birthday' => 'date',
        'login_start_time' => 'date',
        'login_end_time' => 'date',
        'termination_date' => 'date',
        'force_password_change' => null,
        'always_require_password' => null,
        'not_required_to_clock_in' => null,
        'commission_percent' => null,
        'commission_percent_type' => null,
        'hourly_pay_rate' => null,
        'default_register_id' => null,
        'language' => null,
        'locations' => null,
        'permissions' => null,
        'permissions_location' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'username' => 'username',
        'password' => 'password',
        'inactive' => 'inactive',
        'reason_inactive' => 'reason_inactive',
        'hire_date' => 'hire_date',
        'employee_number' => 'employee_number',
        'birthday' => 'birthday',
        'login_start_time' => 'login_start_time',
        'login_end_time' => 'login_end_time',
        'termination_date' => 'termination_date',
        'force_password_change' => 'force_password_change',
        'always_require_password' => 'always_require_password',
        'not_required_to_clock_in' => 'not_required_to_clock_in',
        'commission_percent' => 'commission_percent',
        'commission_percent_type' => 'commission_percent_type',
        'hourly_pay_rate' => 'hourly_pay_rate',
        'default_register_id' => 'default_register_id',
        'language' => 'language',
        'locations' => 'locations',
        'permissions' => 'permissions',
        'permissions_location' => 'permissions_location'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'username' => 'setUsername',
        'password' => 'setPassword',
        'inactive' => 'setInactive',
        'reason_inactive' => 'setReasonInactive',
        'hire_date' => 'setHireDate',
        'employee_number' => 'setEmployeeNumber',
        'birthday' => 'setBirthday',
        'login_start_time' => 'setLoginStartTime',
        'login_end_time' => 'setLoginEndTime',
        'termination_date' => 'setTerminationDate',
        'force_password_change' => 'setForcePasswordChange',
        'always_require_password' => 'setAlwaysRequirePassword',
        'not_required_to_clock_in' => 'setNotRequiredToClockIn',
        'commission_percent' => 'setCommissionPercent',
        'commission_percent_type' => 'setCommissionPercentType',
        'hourly_pay_rate' => 'setHourlyPayRate',
        'default_register_id' => 'setDefaultRegisterId',
        'language' => 'setLanguage',
        'locations' => 'setLocations',
        'permissions' => 'setPermissions',
        'permissions_location' => 'setPermissionsLocation'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'username' => 'getUsername',
        'password' => 'getPassword',
        'inactive' => 'getInactive',
        'reason_inactive' => 'getReasonInactive',
        'hire_date' => 'getHireDate',
        'employee_number' => 'getEmployeeNumber',
        'birthday' => 'getBirthday',
        'login_start_time' => 'getLoginStartTime',
        'login_end_time' => 'getLoginEndTime',
        'termination_date' => 'getTerminationDate',
        'force_password_change' => 'getForcePasswordChange',
        'always_require_password' => 'getAlwaysRequirePassword',
        'not_required_to_clock_in' => 'getNotRequiredToClockIn',
        'commission_percent' => 'getCommissionPercent',
        'commission_percent_type' => 'getCommissionPercentType',
        'hourly_pay_rate' => 'getHourlyPayRate',
        'default_register_id' => 'getDefaultRegisterId',
        'language' => 'getLanguage',
        'locations' => 'getLocations',
        'permissions' => 'getPermissions',
        'permissions_location' => 'getPermissionsLocation'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['username'] = isset($data['username']) ? $data['username'] : null;
        $this->container['password'] = isset($data['password']) ? $data['password'] : null;
        $this->container['inactive'] = isset($data['inactive']) ? $data['inactive'] : null;
        $this->container['reason_inactive'] = isset($data['reason_inactive']) ? $data['reason_inactive'] : null;
        $this->container['hire_date'] = isset($data['hire_date']) ? $data['hire_date'] : null;
        $this->container['employee_number'] = isset($data['employee_number']) ? $data['employee_number'] : null;
        $this->container['birthday'] = isset($data['birthday']) ? $data['birthday'] : null;
        $this->container['login_start_time'] = isset($data['login_start_time']) ? $data['login_start_time'] : null;
        $this->container['login_end_time'] = isset($data['login_end_time']) ? $data['login_end_time'] : null;
        $this->container['termination_date'] = isset($data['termination_date']) ? $data['termination_date'] : null;
        $this->container['force_password_change'] = isset($data['force_password_change']) ? $data['force_password_change'] : null;
        $this->container['always_require_password'] = isset($data['always_require_password']) ? $data['always_require_password'] : null;
        $this->container['not_required_to_clock_in'] = isset($data['not_required_to_clock_in']) ? $data['not_required_to_clock_in'] : null;
        $this->container['commission_percent'] = isset($data['commission_percent']) ? $data['commission_percent'] : null;
        $this->container['commission_percent_type'] = isset($data['commission_percent_type']) ? $data['commission_percent_type'] : null;
        $this->container['hourly_pay_rate'] = isset($data['hourly_pay_rate']) ? $data['hourly_pay_rate'] : null;
        $this->container['default_register_id'] = isset($data['default_register_id']) ? $data['default_register_id'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['locations'] = isset($data['locations']) ? $data['locations'] : null;
        $this->container['permissions'] = isset($data['permissions']) ? $data['permissions'] : null;
        $this->container['permissions_location'] = isset($data['permissions_location']) ? $data['permissions_location'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets username
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->container['username'];
    }

    /**
     * Sets username
     *
     * @param string|null $username username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->container['username'] = $username;

        return $this;
    }

    /**
     * Gets password
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     *
     * @param string|null $password password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->container['password'] = $password;

        return $this;
    }

    /**
     * Gets inactive
     *
     * @return bool|null
     */
    public function getInactive()
    {
        return $this->container['inactive'];
    }

    /**
     * Sets inactive
     *
     * @param bool|null $inactive inactive
     *
     * @return $this
     */
    public function setInactive($inactive)
    {
        $this->container['inactive'] = $inactive;

        return $this;
    }

    /**
     * Gets reason_inactive
     *
     * @return string|null
     */
    public function getReasonInactive()
    {
        return $this->container['reason_inactive'];
    }

    /**
     * Sets reason_inactive
     *
     * @param string|null $reason_inactive reason_inactive
     *
     * @return $this
     */
    public function setReasonInactive($reason_inactive)
    {
        $this->container['reason_inactive'] = $reason_inactive;

        return $this;
    }

    /**
     * Gets hire_date
     *
     * @return \DateTime|null
     */
    public function getHireDate()
    {
        return $this->container['hire_date'];
    }

    /**
     * Sets hire_date
     *
     * @param \DateTime|null $hire_date hire_date
     *
     * @return $this
     */
    public function setHireDate($hire_date)
    {
        $this->container['hire_date'] = $hire_date;

        return $this;
    }

    /**
     * Gets employee_number
     *
     * @return string|null
     */
    public function getEmployeeNumber()
    {
        return $this->container['employee_number'];
    }

    /**
     * Sets employee_number
     *
     * @param string|null $employee_number employee_number
     *
     * @return $this
     */
    public function setEmployeeNumber($employee_number)
    {
        $this->container['employee_number'] = $employee_number;

        return $this;
    }

    /**
     * Gets birthday
     *
     * @return \DateTime|null
     */
    public function getBirthday()
    {
        return $this->container['birthday'];
    }

    /**
     * Sets birthday
     *
     * @param \DateTime|null $birthday birthday
     *
     * @return $this
     */
    public function setBirthday($birthday)
    {
        $this->container['birthday'] = $birthday;

        return $this;
    }

    /**
     * Gets login_start_time
     *
     * @return \DateTime|null
     */
    public function getLoginStartTime()
    {
        return $this->container['login_start_time'];
    }

    /**
     * Sets login_start_time
     *
     * @param \DateTime|null $login_start_time login_start_time
     *
     * @return $this
     */
    public function setLoginStartTime($login_start_time)
    {
        $this->container['login_start_time'] = $login_start_time;

        return $this;
    }

    /**
     * Gets login_end_time
     *
     * @return \DateTime|null
     */
    public function getLoginEndTime()
    {
        return $this->container['login_end_time'];
    }

    /**
     * Sets login_end_time
     *
     * @param \DateTime|null $login_end_time login_end_time
     *
     * @return $this
     */
    public function setLoginEndTime($login_end_time)
    {
        $this->container['login_end_time'] = $login_end_time;

        return $this;
    }

    /**
     * Gets termination_date
     *
     * @return \DateTime|null
     */
    public function getTerminationDate()
    {
        return $this->container['termination_date'];
    }

    /**
     * Sets termination_date
     *
     * @param \DateTime|null $termination_date termination_date
     *
     * @return $this
     */
    public function setTerminationDate($termination_date)
    {
        $this->container['termination_date'] = $termination_date;

        return $this;
    }

    /**
     * Gets force_password_change
     *
     * @return bool|null
     */
    public function getForcePasswordChange()
    {
        return $this->container['force_password_change'];
    }

    /**
     * Sets force_password_change
     *
     * @param bool|null $force_password_change force_password_change
     *
     * @return $this
     */
    public function setForcePasswordChange($force_password_change)
    {
        $this->container['force_password_change'] = $force_password_change;

        return $this;
    }

    /**
     * Gets always_require_password
     *
     * @return bool|null
     */
    public function getAlwaysRequirePassword()
    {
        return $this->container['always_require_password'];
    }

    /**
     * Sets always_require_password
     *
     * @param bool|null $always_require_password always_require_password
     *
     * @return $this
     */
    public function setAlwaysRequirePassword($always_require_password)
    {
        $this->container['always_require_password'] = $always_require_password;

        return $this;
    }

    /**
     * Gets not_required_to_clock_in
     *
     * @return bool|null
     */
    public function getNotRequiredToClockIn()
    {
        return $this->container['not_required_to_clock_in'];
    }

    /**
     * Sets not_required_to_clock_in
     *
     * @param bool|null $not_required_to_clock_in not_required_to_clock_in
     *
     * @return $this
     */
    public function setNotRequiredToClockIn($not_required_to_clock_in)
    {
        $this->container['not_required_to_clock_in'] = $not_required_to_clock_in;

        return $this;
    }

    /**
     * Gets commission_percent
     *
     * @return float|null
     */
    public function getCommissionPercent()
    {
        return $this->container['commission_percent'];
    }

    /**
     * Sets commission_percent
     *
     * @param float|null $commission_percent commission_percent
     *
     * @return $this
     */
    public function setCommissionPercent($commission_percent)
    {
        $this->container['commission_percent'] = $commission_percent;

        return $this;
    }

    /**
     * Gets commission_percent_type
     *
     * @return string|null
     */
    public function getCommissionPercentType()
    {
        return $this->container['commission_percent_type'];
    }

    /**
     * Sets commission_percent_type
     *
     * @param string|null $commission_percent_type commission_percent_type
     *
     * @return $this
     */
    public function setCommissionPercentType($commission_percent_type)
    {
        $this->container['commission_percent_type'] = $commission_percent_type;

        return $this;
    }

    /**
     * Gets hourly_pay_rate
     *
     * @return float|null
     */
    public function getHourlyPayRate()
    {
        return $this->container['hourly_pay_rate'];
    }

    /**
     * Sets hourly_pay_rate
     *
     * @param float|null $hourly_pay_rate hourly_pay_rate
     *
     * @return $this
     */
    public function setHourlyPayRate($hourly_pay_rate)
    {
        $this->container['hourly_pay_rate'] = $hourly_pay_rate;

        return $this;
    }

    /**
     * Gets default_register_id
     *
     * @return int|null
     */
    public function getDefaultRegisterId()
    {
        return $this->container['default_register_id'];
    }

    /**
     * Sets default_register_id
     *
     * @param int|null $default_register_id default_register_id
     *
     * @return $this
     */
    public function setDefaultRegisterId($default_register_id)
    {
        $this->container['default_register_id'] = $default_register_id;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets locations
     *
     * @return int[]|null
     */
    public function getLocations()
    {
        return $this->container['locations'];
    }

    /**
     * Sets locations
     *
     * @param int[]|null $locations locations
     *
     * @return $this
     */
    public function setLocations($locations)
    {
        $this->container['locations'] = $locations;

        return $this;
    }

    /**
     * Gets permissions
     *
     * @return map[string,string[]]|null
     */
    public function getPermissions()
    {
        return $this->container['permissions'];
    }

    /**
     * Sets permissions
     *
     * @param map[string,string[]]|null $permissions permissions
     *
     * @return $this
     */
    public function setPermissions($permissions)
    {
        $this->container['permissions'] = $permissions;

        return $this;
    }

    /**
     * Gets permissions_location
     *
     * @return map[string,\OpenAPI\Client\Model\LocationPermissions]|null
     */
    public function getPermissionsLocation()
    {
        return $this->container['permissions_location'];
    }

    /**
     * Sets permissions_location
     *
     * @param map[string,\OpenAPI\Client\Model\LocationPermissions]|null $permissions_location permissions_location
     *
     * @return $this
     */
    public function setPermissionsLocation($permissions_location)
    {
        $this->container['permissions_location'] = $permissions_location;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


