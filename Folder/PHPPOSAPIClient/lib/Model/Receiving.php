<?php
/**
 * Receiving
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
 * Receiving Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Receiving implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Receiving';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'receiving_id' => 'int',
        'receiving_time' => '\DateTime',
        'subtotal' => 'float',
        'tax' => 'float',
        'total' => 'float',
        'deleted' => 'bool',
        'supplier_first_name' => 'string',
        'supplier_last_name' => 'string',
        'supplier_email' => 'string',
        'supplier_phone_number' => 'string',
        'supplier_address_1' => 'string',
        'supplier_address_2' => 'string',
        'supplier_city' => 'string',
        'supplier_state' => 'string',
        'supplier_zip' => 'string',
        'supplier_country' => 'string',
        'supplier_comments' => 'string',
        'supplier_company_name' => 'string',
        'supplier_account_number' => 'string',
        'supplier_balance' => 'float',
        'supplier_override_default_tax' => 'bool',
        'supplier_tax_class_id' => 'int',
        'supplier_image_url' => 'string',
        'supplier_created_at' => '\DateTime',
        'mode' => 'string',
        'shipping_cost' => 'float',
        'supplier_id' => 'int',
        'transfer_location_id' => 'int',
        'is_po' => 'bool',
        'cart_items' => 'AnyOfRecvCartItem[]',
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
        'receiving_id' => 'uuid',
        'receiving_time' => 'date-time',
        'subtotal' => 'float',
        'tax' => 'float',
        'total' => 'number',
        'deleted' => null,
        'supplier_first_name' => null,
        'supplier_last_name' => null,
        'supplier_email' => null,
        'supplier_phone_number' => null,
        'supplier_address_1' => null,
        'supplier_address_2' => null,
        'supplier_city' => null,
        'supplier_state' => null,
        'supplier_zip' => null,
        'supplier_country' => null,
        'supplier_comments' => null,
        'supplier_company_name' => null,
        'supplier_account_number' => null,
        'supplier_balance' => 'float',
        'supplier_override_default_tax' => null,
        'supplier_tax_class_id' => null,
        'supplier_image_url' => null,
        'supplier_created_at' => 'date-time',
        'mode' => null,
        'shipping_cost' => null,
        'supplier_id' => null,
        'transfer_location_id' => null,
        'is_po' => null,
        'cart_items' => null,
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
        'receiving_id' => 'receiving_id',
        'receiving_time' => 'receiving_time',
        'subtotal' => 'subtotal',
        'tax' => 'tax',
        'total' => 'total',
        'deleted' => 'deleted',
        'supplier_first_name' => 'supplier_first_name',
        'supplier_last_name' => 'supplier_last_name',
        'supplier_email' => 'supplier_email',
        'supplier_phone_number' => 'supplier_phone_number',
        'supplier_address_1' => 'supplier_address_1',
        'supplier_address_2' => 'supplier_address_2',
        'supplier_city' => 'supplier_city',
        'supplier_state' => 'supplier_state',
        'supplier_zip' => 'supplier_zip',
        'supplier_country' => 'supplier_country',
        'supplier_comments' => 'supplier_comments',
        'supplier_company_name' => 'supplier_company_name',
        'supplier_account_number' => 'supplier_account_number',
        'supplier_balance' => 'supplier_balance',
        'supplier_override_default_tax' => 'supplier_override_default_tax',
        'supplier_tax_class_id' => 'supplier_tax_class_id',
        'supplier_image_url' => 'supplier_image_url',
        'supplier_created_at' => 'supplier_created_at',
        'mode' => 'mode',
        'shipping_cost' => 'shipping_cost',
        'supplier_id' => 'supplier_id',
        'transfer_location_id' => 'transfer_location_id',
        'is_po' => 'is_po',
        'cart_items' => 'cart_items',
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
        'receiving_id' => 'setReceivingId',
        'receiving_time' => 'setReceivingTime',
        'subtotal' => 'setSubtotal',
        'tax' => 'setTax',
        'total' => 'setTotal',
        'deleted' => 'setDeleted',
        'supplier_first_name' => 'setSupplierFirstName',
        'supplier_last_name' => 'setSupplierLastName',
        'supplier_email' => 'setSupplierEmail',
        'supplier_phone_number' => 'setSupplierPhoneNumber',
        'supplier_address_1' => 'setSupplierAddress1',
        'supplier_address_2' => 'setSupplierAddress2',
        'supplier_city' => 'setSupplierCity',
        'supplier_state' => 'setSupplierState',
        'supplier_zip' => 'setSupplierZip',
        'supplier_country' => 'setSupplierCountry',
        'supplier_comments' => 'setSupplierComments',
        'supplier_company_name' => 'setSupplierCompanyName',
        'supplier_account_number' => 'setSupplierAccountNumber',
        'supplier_balance' => 'setSupplierBalance',
        'supplier_override_default_tax' => 'setSupplierOverrideDefaultTax',
        'supplier_tax_class_id' => 'setSupplierTaxClassId',
        'supplier_image_url' => 'setSupplierImageUrl',
        'supplier_created_at' => 'setSupplierCreatedAt',
        'mode' => 'setMode',
        'shipping_cost' => 'setShippingCost',
        'supplier_id' => 'setSupplierId',
        'transfer_location_id' => 'setTransferLocationId',
        'is_po' => 'setIsPo',
        'cart_items' => 'setCartItems',
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
        'receiving_id' => 'getReceivingId',
        'receiving_time' => 'getReceivingTime',
        'subtotal' => 'getSubtotal',
        'tax' => 'getTax',
        'total' => 'getTotal',
        'deleted' => 'getDeleted',
        'supplier_first_name' => 'getSupplierFirstName',
        'supplier_last_name' => 'getSupplierLastName',
        'supplier_email' => 'getSupplierEmail',
        'supplier_phone_number' => 'getSupplierPhoneNumber',
        'supplier_address_1' => 'getSupplierAddress1',
        'supplier_address_2' => 'getSupplierAddress2',
        'supplier_city' => 'getSupplierCity',
        'supplier_state' => 'getSupplierState',
        'supplier_zip' => 'getSupplierZip',
        'supplier_country' => 'getSupplierCountry',
        'supplier_comments' => 'getSupplierComments',
        'supplier_company_name' => 'getSupplierCompanyName',
        'supplier_account_number' => 'getSupplierAccountNumber',
        'supplier_balance' => 'getSupplierBalance',
        'supplier_override_default_tax' => 'getSupplierOverrideDefaultTax',
        'supplier_tax_class_id' => 'getSupplierTaxClassId',
        'supplier_image_url' => 'getSupplierImageUrl',
        'supplier_created_at' => 'getSupplierCreatedAt',
        'mode' => 'getMode',
        'shipping_cost' => 'getShippingCost',
        'supplier_id' => 'getSupplierId',
        'transfer_location_id' => 'getTransferLocationId',
        'is_po' => 'getIsPo',
        'cart_items' => 'getCartItems',
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
        $this->container['receiving_id'] = isset($data['receiving_id']) ? $data['receiving_id'] : null;
        $this->container['receiving_time'] = isset($data['receiving_time']) ? $data['receiving_time'] : null;
        $this->container['subtotal'] = isset($data['subtotal']) ? $data['subtotal'] : null;
        $this->container['tax'] = isset($data['tax']) ? $data['tax'] : null;
        $this->container['total'] = isset($data['total']) ? $data['total'] : null;
        $this->container['deleted'] = isset($data['deleted']) ? $data['deleted'] : null;
        $this->container['supplier_first_name'] = isset($data['supplier_first_name']) ? $data['supplier_first_name'] : null;
        $this->container['supplier_last_name'] = isset($data['supplier_last_name']) ? $data['supplier_last_name'] : null;
        $this->container['supplier_email'] = isset($data['supplier_email']) ? $data['supplier_email'] : null;
        $this->container['supplier_phone_number'] = isset($data['supplier_phone_number']) ? $data['supplier_phone_number'] : null;
        $this->container['supplier_address_1'] = isset($data['supplier_address_1']) ? $data['supplier_address_1'] : null;
        $this->container['supplier_address_2'] = isset($data['supplier_address_2']) ? $data['supplier_address_2'] : null;
        $this->container['supplier_city'] = isset($data['supplier_city']) ? $data['supplier_city'] : null;
        $this->container['supplier_state'] = isset($data['supplier_state']) ? $data['supplier_state'] : null;
        $this->container['supplier_zip'] = isset($data['supplier_zip']) ? $data['supplier_zip'] : null;
        $this->container['supplier_country'] = isset($data['supplier_country']) ? $data['supplier_country'] : null;
        $this->container['supplier_comments'] = isset($data['supplier_comments']) ? $data['supplier_comments'] : null;
        $this->container['supplier_company_name'] = isset($data['supplier_company_name']) ? $data['supplier_company_name'] : null;
        $this->container['supplier_account_number'] = isset($data['supplier_account_number']) ? $data['supplier_account_number'] : null;
        $this->container['supplier_balance'] = isset($data['supplier_balance']) ? $data['supplier_balance'] : null;
        $this->container['supplier_override_default_tax'] = isset($data['supplier_override_default_tax']) ? $data['supplier_override_default_tax'] : null;
        $this->container['supplier_tax_class_id'] = isset($data['supplier_tax_class_id']) ? $data['supplier_tax_class_id'] : null;
        $this->container['supplier_image_url'] = isset($data['supplier_image_url']) ? $data['supplier_image_url'] : null;
        $this->container['supplier_created_at'] = isset($data['supplier_created_at']) ? $data['supplier_created_at'] : null;
        $this->container['mode'] = isset($data['mode']) ? $data['mode'] : null;
        $this->container['shipping_cost'] = isset($data['shipping_cost']) ? $data['shipping_cost'] : null;
        $this->container['supplier_id'] = isset($data['supplier_id']) ? $data['supplier_id'] : null;
        $this->container['transfer_location_id'] = isset($data['transfer_location_id']) ? $data['transfer_location_id'] : null;
        $this->container['is_po'] = isset($data['is_po']) ? $data['is_po'] : null;
        $this->container['cart_items'] = isset($data['cart_items']) ? $data['cart_items'] : null;
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
     * Gets receiving_id
     *
     * @return int|null
     */
    public function getReceivingId()
    {
        return $this->container['receiving_id'];
    }

    /**
     * Sets receiving_id
     *
     * @param int|null $receiving_id receiving_id
     *
     * @return $this
     */
    public function setReceivingId($receiving_id)
    {
        $this->container['receiving_id'] = $receiving_id;

        return $this;
    }

    /**
     * Gets receiving_time
     *
     * @return \DateTime|null
     */
    public function getReceivingTime()
    {
        return $this->container['receiving_time'];
    }

    /**
     * Sets receiving_time
     *
     * @param \DateTime|null $receiving_time receiving_time
     *
     * @return $this
     */
    public function setReceivingTime($receiving_time)
    {
        $this->container['receiving_time'] = $receiving_time;

        return $this;
    }

    /**
     * Gets subtotal
     *
     * @return float|null
     */
    public function getSubtotal()
    {
        return $this->container['subtotal'];
    }

    /**
     * Sets subtotal
     *
     * @param float|null $subtotal subtotal
     *
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->container['subtotal'] = $subtotal;

        return $this;
    }

    /**
     * Gets tax
     *
     * @return float|null
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param float|null $tax tax
     *
     * @return $this
     */
    public function setTax($tax)
    {
        $this->container['tax'] = $tax;

        return $this;
    }

    /**
     * Gets total
     *
     * @return float|null
     */
    public function getTotal()
    {
        return $this->container['total'];
    }

    /**
     * Sets total
     *
     * @param float|null $total total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->container['total'] = $total;

        return $this;
    }

    /**
     * Gets deleted
     *
     * @return bool|null
     */
    public function getDeleted()
    {
        return $this->container['deleted'];
    }

    /**
     * Sets deleted
     *
     * @param bool|null $deleted deleted
     *
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->container['deleted'] = $deleted;

        return $this;
    }

    /**
     * Gets supplier_first_name
     *
     * @return string|null
     */
    public function getSupplierFirstName()
    {
        return $this->container['supplier_first_name'];
    }

    /**
     * Sets supplier_first_name
     *
     * @param string|null $supplier_first_name supplier_first_name
     *
     * @return $this
     */
    public function setSupplierFirstName($supplier_first_name)
    {
        $this->container['supplier_first_name'] = $supplier_first_name;

        return $this;
    }

    /**
     * Gets supplier_last_name
     *
     * @return string|null
     */
    public function getSupplierLastName()
    {
        return $this->container['supplier_last_name'];
    }

    /**
     * Sets supplier_last_name
     *
     * @param string|null $supplier_last_name supplier_last_name
     *
     * @return $this
     */
    public function setSupplierLastName($supplier_last_name)
    {
        $this->container['supplier_last_name'] = $supplier_last_name;

        return $this;
    }

    /**
     * Gets supplier_email
     *
     * @return string|null
     */
    public function getSupplierEmail()
    {
        return $this->container['supplier_email'];
    }

    /**
     * Sets supplier_email
     *
     * @param string|null $supplier_email supplier_email
     *
     * @return $this
     */
    public function setSupplierEmail($supplier_email)
    {
        $this->container['supplier_email'] = $supplier_email;

        return $this;
    }

    /**
     * Gets supplier_phone_number
     *
     * @return string|null
     */
    public function getSupplierPhoneNumber()
    {
        return $this->container['supplier_phone_number'];
    }

    /**
     * Sets supplier_phone_number
     *
     * @param string|null $supplier_phone_number supplier_phone_number
     *
     * @return $this
     */
    public function setSupplierPhoneNumber($supplier_phone_number)
    {
        $this->container['supplier_phone_number'] = $supplier_phone_number;

        return $this;
    }

    /**
     * Gets supplier_address_1
     *
     * @return string|null
     */
    public function getSupplierAddress1()
    {
        return $this->container['supplier_address_1'];
    }

    /**
     * Sets supplier_address_1
     *
     * @param string|null $supplier_address_1 supplier_address_1
     *
     * @return $this
     */
    public function setSupplierAddress1($supplier_address_1)
    {
        $this->container['supplier_address_1'] = $supplier_address_1;

        return $this;
    }

    /**
     * Gets supplier_address_2
     *
     * @return string|null
     */
    public function getSupplierAddress2()
    {
        return $this->container['supplier_address_2'];
    }

    /**
     * Sets supplier_address_2
     *
     * @param string|null $supplier_address_2 supplier_address_2
     *
     * @return $this
     */
    public function setSupplierAddress2($supplier_address_2)
    {
        $this->container['supplier_address_2'] = $supplier_address_2;

        return $this;
    }

    /**
     * Gets supplier_city
     *
     * @return string|null
     */
    public function getSupplierCity()
    {
        return $this->container['supplier_city'];
    }

    /**
     * Sets supplier_city
     *
     * @param string|null $supplier_city supplier_city
     *
     * @return $this
     */
    public function setSupplierCity($supplier_city)
    {
        $this->container['supplier_city'] = $supplier_city;

        return $this;
    }

    /**
     * Gets supplier_state
     *
     * @return string|null
     */
    public function getSupplierState()
    {
        return $this->container['supplier_state'];
    }

    /**
     * Sets supplier_state
     *
     * @param string|null $supplier_state supplier_state
     *
     * @return $this
     */
    public function setSupplierState($supplier_state)
    {
        $this->container['supplier_state'] = $supplier_state;

        return $this;
    }

    /**
     * Gets supplier_zip
     *
     * @return string|null
     */
    public function getSupplierZip()
    {
        return $this->container['supplier_zip'];
    }

    /**
     * Sets supplier_zip
     *
     * @param string|null $supplier_zip supplier_zip
     *
     * @return $this
     */
    public function setSupplierZip($supplier_zip)
    {
        $this->container['supplier_zip'] = $supplier_zip;

        return $this;
    }

    /**
     * Gets supplier_country
     *
     * @return string|null
     */
    public function getSupplierCountry()
    {
        return $this->container['supplier_country'];
    }

    /**
     * Sets supplier_country
     *
     * @param string|null $supplier_country supplier_country
     *
     * @return $this
     */
    public function setSupplierCountry($supplier_country)
    {
        $this->container['supplier_country'] = $supplier_country;

        return $this;
    }

    /**
     * Gets supplier_comments
     *
     * @return string|null
     */
    public function getSupplierComments()
    {
        return $this->container['supplier_comments'];
    }

    /**
     * Sets supplier_comments
     *
     * @param string|null $supplier_comments supplier_comments
     *
     * @return $this
     */
    public function setSupplierComments($supplier_comments)
    {
        $this->container['supplier_comments'] = $supplier_comments;

        return $this;
    }

    /**
     * Gets supplier_company_name
     *
     * @return string|null
     */
    public function getSupplierCompanyName()
    {
        return $this->container['supplier_company_name'];
    }

    /**
     * Sets supplier_company_name
     *
     * @param string|null $supplier_company_name supplier_company_name
     *
     * @return $this
     */
    public function setSupplierCompanyName($supplier_company_name)
    {
        $this->container['supplier_company_name'] = $supplier_company_name;

        return $this;
    }

    /**
     * Gets supplier_account_number
     *
     * @return string|null
     */
    public function getSupplierAccountNumber()
    {
        return $this->container['supplier_account_number'];
    }

    /**
     * Sets supplier_account_number
     *
     * @param string|null $supplier_account_number supplier_account_number
     *
     * @return $this
     */
    public function setSupplierAccountNumber($supplier_account_number)
    {
        $this->container['supplier_account_number'] = $supplier_account_number;

        return $this;
    }

    /**
     * Gets supplier_balance
     *
     * @return float|null
     */
    public function getSupplierBalance()
    {
        return $this->container['supplier_balance'];
    }

    /**
     * Sets supplier_balance
     *
     * @param float|null $supplier_balance supplier_balance
     *
     * @return $this
     */
    public function setSupplierBalance($supplier_balance)
    {
        $this->container['supplier_balance'] = $supplier_balance;

        return $this;
    }

    /**
     * Gets supplier_override_default_tax
     *
     * @return bool|null
     */
    public function getSupplierOverrideDefaultTax()
    {
        return $this->container['supplier_override_default_tax'];
    }

    /**
     * Sets supplier_override_default_tax
     *
     * @param bool|null $supplier_override_default_tax supplier_override_default_tax
     *
     * @return $this
     */
    public function setSupplierOverrideDefaultTax($supplier_override_default_tax)
    {
        $this->container['supplier_override_default_tax'] = $supplier_override_default_tax;

        return $this;
    }

    /**
     * Gets supplier_tax_class_id
     *
     * @return int|null
     */
    public function getSupplierTaxClassId()
    {
        return $this->container['supplier_tax_class_id'];
    }

    /**
     * Sets supplier_tax_class_id
     *
     * @param int|null $supplier_tax_class_id supplier_tax_class_id
     *
     * @return $this
     */
    public function setSupplierTaxClassId($supplier_tax_class_id)
    {
        $this->container['supplier_tax_class_id'] = $supplier_tax_class_id;

        return $this;
    }

    /**
     * Gets supplier_image_url
     *
     * @return string|null
     */
    public function getSupplierImageUrl()
    {
        return $this->container['supplier_image_url'];
    }

    /**
     * Sets supplier_image_url
     *
     * @param string|null $supplier_image_url supplier_image_url
     *
     * @return $this
     */
    public function setSupplierImageUrl($supplier_image_url)
    {
        $this->container['supplier_image_url'] = $supplier_image_url;

        return $this;
    }

    /**
     * Gets supplier_created_at
     *
     * @return \DateTime|null
     */
    public function getSupplierCreatedAt()
    {
        return $this->container['supplier_created_at'];
    }

    /**
     * Sets supplier_created_at
     *
     * @param \DateTime|null $supplier_created_at supplier_created_at
     *
     * @return $this
     */
    public function setSupplierCreatedAt($supplier_created_at)
    {
        $this->container['supplier_created_at'] = $supplier_created_at;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return string|null
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param string|null $mode mode
     *
     * @return $this
     */
    public function setMode($mode)
    {
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets shipping_cost
     *
     * @return float|null
     */
    public function getShippingCost()
    {
        return $this->container['shipping_cost'];
    }

    /**
     * Sets shipping_cost
     *
     * @param float|null $shipping_cost shipping_cost
     *
     * @return $this
     */
    public function setShippingCost($shipping_cost)
    {
        $this->container['shipping_cost'] = $shipping_cost;

        return $this;
    }

    /**
     * Gets supplier_id
     *
     * @return int|null
     */
    public function getSupplierId()
    {
        return $this->container['supplier_id'];
    }

    /**
     * Sets supplier_id
     *
     * @param int|null $supplier_id supplier_id
     *
     * @return $this
     */
    public function setSupplierId($supplier_id)
    {
        $this->container['supplier_id'] = $supplier_id;

        return $this;
    }

    /**
     * Gets transfer_location_id
     *
     * @return int|null
     */
    public function getTransferLocationId()
    {
        return $this->container['transfer_location_id'];
    }

    /**
     * Sets transfer_location_id
     *
     * @param int|null $transfer_location_id transfer_location_id
     *
     * @return $this
     */
    public function setTransferLocationId($transfer_location_id)
    {
        $this->container['transfer_location_id'] = $transfer_location_id;

        return $this;
    }

    /**
     * Gets is_po
     *
     * @return bool|null
     */
    public function getIsPo()
    {
        return $this->container['is_po'];
    }

    /**
     * Sets is_po
     *
     * @param bool|null $is_po is_po
     *
     * @return $this
     */
    public function setIsPo($is_po)
    {
        $this->container['is_po'] = $is_po;

        return $this;
    }

    /**
     * Gets cart_items
     *
     * @return AnyOfRecvCartItem[]|null
     */
    public function getCartItems()
    {
        return $this->container['cart_items'];
    }

    /**
     * Sets cart_items
     *
     * @param AnyOfRecvCartItem[]|null $cart_items cart_items
     *
     * @return $this
     */
    public function setCartItems($cart_items)
    {
        $this->container['cart_items'] = $cart_items;

        return $this;
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

