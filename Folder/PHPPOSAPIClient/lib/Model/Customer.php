<?php
/**
 * Customer
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
 * Customer Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Customer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Customer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'person_id' => 'int',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'address_1' => 'string',
        'address_2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'country' => 'string',
        'comments' => 'string',
        'custom_fields' => 'map[string,string]',
        'company_name' => 'string',
        'tier_id' => 'int',
        'account_number' => 'string',
        'taxable' => 'bool',
        'tax_certificate' => 'string',
        'internal_notes' => 'string',
        'override_default_tax' => 'bool',
        'tax_class_id' => 'int',
        'balance' => 'float',
        'credit_limit' => 'float',
        'points' => 'int',
        'disable_loyalty' => 'bool',
        'amount_to_spend_for_next_point' => 'float',
        'remaining_sales_before_discount' => 'int',
        'location_id' => 'int',
        'image_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'person_id' => 'uuid',
        'first_name' => null,
        'last_name' => null,
        'email' => null,
        'phone_number' => null,
        'address_1' => null,
        'address_2' => null,
        'city' => null,
        'state' => null,
        'zip' => null,
        'country' => null,
        'comments' => null,
        'custom_fields' => null,
        'company_name' => null,
        'tier_id' => 'uuid',
        'account_number' => null,
        'taxable' => null,
        'tax_certificate' => null,
        'internal_notes' => null,
        'override_default_tax' => null,
        'tax_class_id' => 'uuid',
        'balance' => 'float',
        'credit_limit' => 'float',
        'points' => 'int32',
        'disable_loyalty' => null,
        'amount_to_spend_for_next_point' => 'float',
        'remaining_sales_before_discount' => 'int32',
        'location_id' => 'int32',
        'image_url' => null
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
        'person_id' => 'person_id',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'email' => 'email',
        'phone_number' => 'phone_number',
        'address_1' => 'address_1',
        'address_2' => 'address_2',
        'city' => 'city',
        'state' => 'state',
        'zip' => 'zip',
        'country' => 'country',
        'comments' => 'comments',
        'custom_fields' => 'custom_fields',
        'company_name' => 'company_name',
        'tier_id' => 'tier_id',
        'account_number' => 'account_number',
        'taxable' => 'taxable',
        'tax_certificate' => 'tax_certificate',
        'internal_notes' => 'internal_notes',
        'override_default_tax' => 'override_default_tax',
        'tax_class_id' => 'tax_class_id',
        'balance' => 'balance',
        'credit_limit' => 'credit_limit',
        'points' => 'points',
        'disable_loyalty' => 'disable_loyalty',
        'amount_to_spend_for_next_point' => 'amount_to_spend_for_next_point',
        'remaining_sales_before_discount' => 'remaining_sales_before_discount',
        'location_id' => 'location_id',
        'image_url' => 'image_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'person_id' => 'setPersonId',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'email' => 'setEmail',
        'phone_number' => 'setPhoneNumber',
        'address_1' => 'setAddress1',
        'address_2' => 'setAddress2',
        'city' => 'setCity',
        'state' => 'setState',
        'zip' => 'setZip',
        'country' => 'setCountry',
        'comments' => 'setComments',
        'custom_fields' => 'setCustomFields',
        'company_name' => 'setCompanyName',
        'tier_id' => 'setTierId',
        'account_number' => 'setAccountNumber',
        'taxable' => 'setTaxable',
        'tax_certificate' => 'setTaxCertificate',
        'internal_notes' => 'setInternalNotes',
        'override_default_tax' => 'setOverrideDefaultTax',
        'tax_class_id' => 'setTaxClassId',
        'balance' => 'setBalance',
        'credit_limit' => 'setCreditLimit',
        'points' => 'setPoints',
        'disable_loyalty' => 'setDisableLoyalty',
        'amount_to_spend_for_next_point' => 'setAmountToSpendForNextPoint',
        'remaining_sales_before_discount' => 'setRemainingSalesBeforeDiscount',
        'location_id' => 'setLocationId',
        'image_url' => 'setImageUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'person_id' => 'getPersonId',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'email' => 'getEmail',
        'phone_number' => 'getPhoneNumber',
        'address_1' => 'getAddress1',
        'address_2' => 'getAddress2',
        'city' => 'getCity',
        'state' => 'getState',
        'zip' => 'getZip',
        'country' => 'getCountry',
        'comments' => 'getComments',
        'custom_fields' => 'getCustomFields',
        'company_name' => 'getCompanyName',
        'tier_id' => 'getTierId',
        'account_number' => 'getAccountNumber',
        'taxable' => 'getTaxable',
        'tax_certificate' => 'getTaxCertificate',
        'internal_notes' => 'getInternalNotes',
        'override_default_tax' => 'getOverrideDefaultTax',
        'tax_class_id' => 'getTaxClassId',
        'balance' => 'getBalance',
        'credit_limit' => 'getCreditLimit',
        'points' => 'getPoints',
        'disable_loyalty' => 'getDisableLoyalty',
        'amount_to_spend_for_next_point' => 'getAmountToSpendForNextPoint',
        'remaining_sales_before_discount' => 'getRemainingSalesBeforeDiscount',
        'location_id' => 'getLocationId',
        'image_url' => 'getImageUrl'
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
        $this->container['person_id'] = isset($data['person_id']) ? $data['person_id'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['phone_number'] = isset($data['phone_number']) ? $data['phone_number'] : null;
        $this->container['address_1'] = isset($data['address_1']) ? $data['address_1'] : null;
        $this->container['address_2'] = isset($data['address_2']) ? $data['address_2'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['comments'] = isset($data['comments']) ? $data['comments'] : null;
        $this->container['custom_fields'] = isset($data['custom_fields']) ? $data['custom_fields'] : null;
        $this->container['company_name'] = isset($data['company_name']) ? $data['company_name'] : null;
        $this->container['tier_id'] = isset($data['tier_id']) ? $data['tier_id'] : null;
        $this->container['account_number'] = isset($data['account_number']) ? $data['account_number'] : null;
        $this->container['taxable'] = isset($data['taxable']) ? $data['taxable'] : null;
        $this->container['tax_certificate'] = isset($data['tax_certificate']) ? $data['tax_certificate'] : null;
        $this->container['internal_notes'] = isset($data['internal_notes']) ? $data['internal_notes'] : null;
        $this->container['override_default_tax'] = isset($data['override_default_tax']) ? $data['override_default_tax'] : null;
        $this->container['tax_class_id'] = isset($data['tax_class_id']) ? $data['tax_class_id'] : null;
        $this->container['balance'] = isset($data['balance']) ? $data['balance'] : null;
        $this->container['credit_limit'] = isset($data['credit_limit']) ? $data['credit_limit'] : null;
        $this->container['points'] = isset($data['points']) ? $data['points'] : null;
        $this->container['disable_loyalty'] = isset($data['disable_loyalty']) ? $data['disable_loyalty'] : null;
        $this->container['amount_to_spend_for_next_point'] = isset($data['amount_to_spend_for_next_point']) ? $data['amount_to_spend_for_next_point'] : null;
        $this->container['remaining_sales_before_discount'] = isset($data['remaining_sales_before_discount']) ? $data['remaining_sales_before_discount'] : null;
        $this->container['location_id'] = isset($data['location_id']) ? $data['location_id'] : null;
        $this->container['image_url'] = isset($data['image_url']) ? $data['image_url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
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
     * Gets person_id
     *
     * @return int|null
     */
    public function getPersonId()
    {
        return $this->container['person_id'];
    }

    /**
     * Sets person_id
     *
     * @param int|null $person_id person_id
     *
     * @return $this
     */
    public function setPersonId($person_id)
    {
        $this->container['person_id'] = $person_id;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name first_name
     *
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string|null $last_name last_name
     *
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string|null $phone_number phone_number
     *
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets address_1
     *
     * @return string|null
     */
    public function getAddress1()
    {
        return $this->container['address_1'];
    }

    /**
     * Sets address_1
     *
     * @param string|null $address_1 address_1
     *
     * @return $this
     */
    public function setAddress1($address_1)
    {
        $this->container['address_1'] = $address_1;

        return $this;
    }

    /**
     * Gets address_2
     *
     * @return string|null
     */
    public function getAddress2()
    {
        return $this->container['address_2'];
    }

    /**
     * Sets address_2
     *
     * @param string|null $address_2 address_2
     *
     * @return $this
     */
    public function setAddress2($address_2)
    {
        $this->container['address_2'] = $address_2;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string|null $state state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets zip
     *
     * @return string|null
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param string|null $zip zip
     *
     * @return $this
     */
    public function setZip($zip)
    {
        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string|null $country country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return string|null
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param string|null $comments comments
     *
     * @return $this
     */
    public function setComments($comments)
    {
        $this->container['comments'] = $comments;

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
     * Gets company_name
     *
     * @return string|null
     */
    public function getCompanyName()
    {
        return $this->container['company_name'];
    }

    /**
     * Sets company_name
     *
     * @param string|null $company_name company_name
     *
     * @return $this
     */
    public function setCompanyName($company_name)
    {
        $this->container['company_name'] = $company_name;

        return $this;
    }

    /**
     * Gets tier_id
     *
     * @return int|null
     */
    public function getTierId()
    {
        return $this->container['tier_id'];
    }

    /**
     * Sets tier_id
     *
     * @param int|null $tier_id tier_id
     *
     * @return $this
     */
    public function setTierId($tier_id)
    {
        $this->container['tier_id'] = $tier_id;

        return $this;
    }

    /**
     * Gets account_number
     *
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->container['account_number'];
    }

    /**
     * Sets account_number
     *
     * @param string|null $account_number account_number
     *
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        $this->container['account_number'] = $account_number;

        return $this;
    }

    /**
     * Gets taxable
     *
     * @return bool|null
     */
    public function getTaxable()
    {
        return $this->container['taxable'];
    }

    /**
     * Sets taxable
     *
     * @param bool|null $taxable taxable
     *
     * @return $this
     */
    public function setTaxable($taxable)
    {
        $this->container['taxable'] = $taxable;

        return $this;
    }

    /**
     * Gets tax_certificate
     *
     * @return string|null
     */
    public function getTaxCertificate()
    {
        return $this->container['tax_certificate'];
    }

    /**
     * Sets tax_certificate
     *
     * @param string|null $tax_certificate tax_certificate
     *
     * @return $this
     */
    public function setTaxCertificate($tax_certificate)
    {
        $this->container['tax_certificate'] = $tax_certificate;

        return $this;
    }

    /**
     * Gets internal_notes
     *
     * @return string|null
     */
    public function getInternalNotes()
    {
        return $this->container['internal_notes'];
    }

    /**
     * Sets internal_notes
     *
     * @param string|null $internal_notes internal_notes
     *
     * @return $this
     */
    public function setInternalNotes($internal_notes)
    {
        $this->container['internal_notes'] = $internal_notes;

        return $this;
    }

    /**
     * Gets override_default_tax
     *
     * @return bool|null
     */
    public function getOverrideDefaultTax()
    {
        return $this->container['override_default_tax'];
    }

    /**
     * Sets override_default_tax
     *
     * @param bool|null $override_default_tax override_default_tax
     *
     * @return $this
     */
    public function setOverrideDefaultTax($override_default_tax)
    {
        $this->container['override_default_tax'] = $override_default_tax;

        return $this;
    }

    /**
     * Gets tax_class_id
     *
     * @return int|null
     */
    public function getTaxClassId()
    {
        return $this->container['tax_class_id'];
    }

    /**
     * Sets tax_class_id
     *
     * @param int|null $tax_class_id tax_class_id
     *
     * @return $this
     */
    public function setTaxClassId($tax_class_id)
    {
        $this->container['tax_class_id'] = $tax_class_id;

        return $this;
    }

    /**
     * Gets balance
     *
     * @return float|null
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param float|null $balance balance
     *
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->container['balance'] = $balance;

        return $this;
    }

    /**
     * Gets credit_limit
     *
     * @return float|null
     */
    public function getCreditLimit()
    {
        return $this->container['credit_limit'];
    }

    /**
     * Sets credit_limit
     *
     * @param float|null $credit_limit credit_limit
     *
     * @return $this
     */
    public function setCreditLimit($credit_limit)
    {
        $this->container['credit_limit'] = $credit_limit;

        return $this;
    }

    /**
     * Gets points
     *
     * @return int|null
     */
    public function getPoints()
    {
        return $this->container['points'];
    }

    /**
     * Sets points
     *
     * @param int|null $points points
     *
     * @return $this
     */
    public function setPoints($points)
    {
        $this->container['points'] = $points;

        return $this;
    }

    /**
     * Gets disable_loyalty
     *
     * @return bool|null
     */
    public function getDisableLoyalty()
    {
        return $this->container['disable_loyalty'];
    }

    /**
     * Sets disable_loyalty
     *
     * @param bool|null $disable_loyalty disable_loyalty
     *
     * @return $this
     */
    public function setDisableLoyalty($disable_loyalty)
    {
        $this->container['disable_loyalty'] = $disable_loyalty;

        return $this;
    }

    /**
     * Gets amount_to_spend_for_next_point
     *
     * @return float|null
     */
    public function getAmountToSpendForNextPoint()
    {
        return $this->container['amount_to_spend_for_next_point'];
    }

    /**
     * Sets amount_to_spend_for_next_point
     *
     * @param float|null $amount_to_spend_for_next_point amount_to_spend_for_next_point
     *
     * @return $this
     */
    public function setAmountToSpendForNextPoint($amount_to_spend_for_next_point)
    {
        $this->container['amount_to_spend_for_next_point'] = $amount_to_spend_for_next_point;

        return $this;
    }

    /**
     * Gets remaining_sales_before_discount
     *
     * @return int|null
     */
    public function getRemainingSalesBeforeDiscount()
    {
        return $this->container['remaining_sales_before_discount'];
    }

    /**
     * Sets remaining_sales_before_discount
     *
     * @param int|null $remaining_sales_before_discount remaining_sales_before_discount
     *
     * @return $this
     */
    public function setRemainingSalesBeforeDiscount($remaining_sales_before_discount)
    {
        $this->container['remaining_sales_before_discount'] = $remaining_sales_before_discount;

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
     * Gets image_url
     *
     * @return string|null
     */
    public function getImageUrl()
    {
        return $this->container['image_url'];
    }

    /**
     * Sets image_url
     *
     * @param string|null $image_url image_url
     *
     * @return $this
     */
    public function setImageUrl($image_url)
    {
        $this->container['image_url'] = $image_url;

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

