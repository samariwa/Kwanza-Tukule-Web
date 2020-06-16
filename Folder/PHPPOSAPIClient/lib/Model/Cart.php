<?php
/**
 * Cart
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
 * Cart Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Cart implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Cart';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'location_id' => 'int',
        'employee_id' => 'int',
        'register_id' => 'int',
        'excluded_taxes' => 'string[]',
        'comment' => 'string',
        'paid_store_account_ids' => 'int[]',
        'skip_webhook' => 'bool',
        'change_cart_date' => '\DateTime',
        'suspended' => 'int',
        'custom_fields' => 'map[string,string]',
        'payments' => '\OpenAPI\Client\Model\CartPayment[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'location_id' => null,
        'employee_id' => null,
        'register_id' => null,
        'excluded_taxes' => null,
        'comment' => null,
        'paid_store_account_ids' => null,
        'skip_webhook' => null,
        'change_cart_date' => 'date-time',
        'suspended' => null,
        'custom_fields' => null,
        'payments' => null
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
        'location_id' => 'location_id',
        'employee_id' => 'employee_id',
        'register_id' => 'register_id',
        'excluded_taxes' => 'excluded_taxes',
        'comment' => 'comment',
        'paid_store_account_ids' => 'paid_store_account_ids',
        'skip_webhook' => 'skip_webhook',
        'change_cart_date' => 'change_cart_date',
        'suspended' => 'suspended',
        'custom_fields' => 'custom_fields',
        'payments' => 'payments'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'location_id' => 'setLocationId',
        'employee_id' => 'setEmployeeId',
        'register_id' => 'setRegisterId',
        'excluded_taxes' => 'setExcludedTaxes',
        'comment' => 'setComment',
        'paid_store_account_ids' => 'setPaidStoreAccountIds',
        'skip_webhook' => 'setSkipWebhook',
        'change_cart_date' => 'setChangeCartDate',
        'suspended' => 'setSuspended',
        'custom_fields' => 'setCustomFields',
        'payments' => 'setPayments'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'location_id' => 'getLocationId',
        'employee_id' => 'getEmployeeId',
        'register_id' => 'getRegisterId',
        'excluded_taxes' => 'getExcludedTaxes',
        'comment' => 'getComment',
        'paid_store_account_ids' => 'getPaidStoreAccountIds',
        'skip_webhook' => 'getSkipWebhook',
        'change_cart_date' => 'getChangeCartDate',
        'suspended' => 'getSuspended',
        'custom_fields' => 'getCustomFields',
        'payments' => 'getPayments'
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
        $this->container['location_id'] = isset($data['location_id']) ? $data['location_id'] : null;
        $this->container['employee_id'] = isset($data['employee_id']) ? $data['employee_id'] : null;
        $this->container['register_id'] = isset($data['register_id']) ? $data['register_id'] : null;
        $this->container['excluded_taxes'] = isset($data['excluded_taxes']) ? $data['excluded_taxes'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['paid_store_account_ids'] = isset($data['paid_store_account_ids']) ? $data['paid_store_account_ids'] : null;
        $this->container['skip_webhook'] = isset($data['skip_webhook']) ? $data['skip_webhook'] : null;
        $this->container['change_cart_date'] = isset($data['change_cart_date']) ? $data['change_cart_date'] : null;
        $this->container['suspended'] = isset($data['suspended']) ? $data['suspended'] : null;
        $this->container['custom_fields'] = isset($data['custom_fields']) ? $data['custom_fields'] : null;
        $this->container['payments'] = isset($data['payments']) ? $data['payments'] : null;
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
     * Gets location_id
     *
     * @return int|null
     */
    public function getLocationId()
    {
        return $this->container['location_id'];
    }

    /**
     * Sets location_id
     *
     * @param int|null $location_id location_id
     *
     * @return $this
     */
    public function setLocationId($location_id)
    {
        $this->container['location_id'] = $location_id;

        return $this;
    }

    /**
     * Gets employee_id
     *
     * @return int|null
     */
    public function getEmployeeId()
    {
        return $this->container['employee_id'];
    }

    /**
     * Sets employee_id
     *
     * @param int|null $employee_id employee_id
     *
     * @return $this
     */
    public function setEmployeeId($employee_id)
    {
        $this->container['employee_id'] = $employee_id;

        return $this;
    }

    /**
     * Gets register_id
     *
     * @return int|null
     */
    public function getRegisterId()
    {
        return $this->container['register_id'];
    }

    /**
     * Sets register_id
     *
     * @param int|null $register_id register_id
     *
     * @return $this
     */
    public function setRegisterId($register_id)
    {
        $this->container['register_id'] = $register_id;

        return $this;
    }

    /**
     * Gets excluded_taxes
     *
     * @return string[]|null
     */
    public function getExcludedTaxes()
    {
        return $this->container['excluded_taxes'];
    }

    /**
     * Sets excluded_taxes
     *
     * @param string[]|null $excluded_taxes excluded_taxes
     *
     * @return $this
     */
    public function setExcludedTaxes($excluded_taxes)
    {
        $this->container['excluded_taxes'] = $excluded_taxes;

        return $this;
    }

    /**
     * Gets comment
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string|null $comment comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets paid_store_account_ids
     *
     * @return int[]|null
     */
    public function getPaidStoreAccountIds()
    {
        return $this->container['paid_store_account_ids'];
    }

    /**
     * Sets paid_store_account_ids
     *
     * @param int[]|null $paid_store_account_ids paid_store_account_ids
     *
     * @return $this
     */
    public function setPaidStoreAccountIds($paid_store_account_ids)
    {
        $this->container['paid_store_account_ids'] = $paid_store_account_ids;

        return $this;
    }

    /**
     * Gets skip_webhook
     *
     * @return bool|null
     */
    public function getSkipWebhook()
    {
        return $this->container['skip_webhook'];
    }

    /**
     * Sets skip_webhook
     *
     * @param bool|null $skip_webhook skip_webhook
     *
     * @return $this
     */
    public function setSkipWebhook($skip_webhook)
    {
        $this->container['skip_webhook'] = $skip_webhook;

        return $this;
    }

    /**
     * Gets change_cart_date
     *
     * @return \DateTime|null
     */
    public function getChangeCartDate()
    {
        return $this->container['change_cart_date'];
    }

    /**
     * Sets change_cart_date
     *
     * @param \DateTime|null $change_cart_date change_cart_date
     *
     * @return $this
     */
    public function setChangeCartDate($change_cart_date)
    {
        $this->container['change_cart_date'] = $change_cart_date;

        return $this;
    }

    /**
     * Gets suspended
     *
     * @return int|null
     */
    public function getSuspended()
    {
        return $this->container['suspended'];
    }

    /**
     * Sets suspended
     *
     * @param int|null $suspended suspended
     *
     * @return $this
     */
    public function setSuspended($suspended)
    {
        $this->container['suspended'] = $suspended;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return map[string,string]|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param map[string,string]|null $custom_fields custom_fields
     *
     * @return $this
     */
    public function setCustomFields($custom_fields)
    {
        $this->container['custom_fields'] = $custom_fields;

        return $this;
    }

    /**
     * Gets payments
     *
     * @return \OpenAPI\Client\Model\CartPayment[]|null
     */
    public function getPayments()
    {
        return $this->container['payments'];
    }

    /**
     * Sets payments
     *
     * @param \OpenAPI\Client\Model\CartPayment[]|null $payments payments
     *
     * @return $this
     */
    public function setPayments($payments)
    {
        $this->container['payments'] = $payments;

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

