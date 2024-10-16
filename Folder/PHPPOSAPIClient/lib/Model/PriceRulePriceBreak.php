<?php
/**
 * PriceRulePriceBreak
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
 * PriceRulePriceBreak Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PriceRulePriceBreak implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PriceRulePriceBreak';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'item_qty_to_buy' => 'int',
        'discount_per_unit_fixed' => 'float',
        'discount_per_unit_percent' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'item_qty_to_buy' => null,
        'discount_per_unit_fixed' => 'float',
        'discount_per_unit_percent' => 'float'
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
        'item_qty_to_buy' => 'item_qty_to_buy',
        'discount_per_unit_fixed' => 'discount_per_unit_fixed',
        'discount_per_unit_percent' => 'discount_per_unit_percent'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'item_qty_to_buy' => 'setItemQtyToBuy',
        'discount_per_unit_fixed' => 'setDiscountPerUnitFixed',
        'discount_per_unit_percent' => 'setDiscountPerUnitPercent'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'item_qty_to_buy' => 'getItemQtyToBuy',
        'discount_per_unit_fixed' => 'getDiscountPerUnitFixed',
        'discount_per_unit_percent' => 'getDiscountPerUnitPercent'
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
        $this->container['item_qty_to_buy'] = isset($data['item_qty_to_buy']) ? $data['item_qty_to_buy'] : null;
        $this->container['discount_per_unit_fixed'] = isset($data['discount_per_unit_fixed']) ? $data['discount_per_unit_fixed'] : null;
        $this->container['discount_per_unit_percent'] = isset($data['discount_per_unit_percent']) ? $data['discount_per_unit_percent'] : null;
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
     * Gets item_qty_to_buy
     *
     * @return int|null
     */
    public function getItemQtyToBuy()
    {
        return $this->container['item_qty_to_buy'];
    }

    /**
     * Sets item_qty_to_buy
     *
     * @param int|null $item_qty_to_buy item_qty_to_buy
     *
     * @return $this
     */
    public function setItemQtyToBuy($item_qty_to_buy)
    {
        $this->container['item_qty_to_buy'] = $item_qty_to_buy;

        return $this;
    }

    /**
     * Gets discount_per_unit_fixed
     *
     * @return float|null
     */
    public function getDiscountPerUnitFixed()
    {
        return $this->container['discount_per_unit_fixed'];
    }

    /**
     * Sets discount_per_unit_fixed
     *
     * @param float|null $discount_per_unit_fixed discount_per_unit_fixed
     *
     * @return $this
     */
    public function setDiscountPerUnitFixed($discount_per_unit_fixed)
    {
        $this->container['discount_per_unit_fixed'] = $discount_per_unit_fixed;

        return $this;
    }

    /**
     * Gets discount_per_unit_percent
     *
     * @return float|null
     */
    public function getDiscountPerUnitPercent()
    {
        return $this->container['discount_per_unit_percent'];
    }

    /**
     * Sets discount_per_unit_percent
     *
     * @param float|null $discount_per_unit_percent discount_per_unit_percent
     *
     * @return $this
     */
    public function setDiscountPerUnitPercent($discount_per_unit_percent)
    {
        $this->container['discount_per_unit_percent'] = $discount_per_unit_percent;

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


