<?php
/**
 * ProductApplication.
 *
 * @category Class
 * @author   Tencent Business Enterprise Pay Team
 * @see     https://business.tenpay.com
 */

/**
 * NOTE: File generated from our OpenAPI spec (https://business.tenpay.com).
 * https://business.tenpay.com
 * Do not edit the class manually.
 */

namespace Entpay\Mse\Client\Api;

use ArrayAccess;
use Entpay\Mse\Client\Http\EntpayClient;
use Entpay\Mse\Client\Model\AccountLink;
use Entpay\Mse\Client\Model\ModelInterface;
use Entpay\Mse\Client\ObjectSerializer;
use JsonSerializable;

/**
 * ProductApplication Class Doc Comment.
 *
 * @category Class
 * @author   Tencent Business Enterprise Pay Team
 * @see     https://business.tenpay.com
 */
class ProductApplication implements ModelInterface, ArrayAccess, JsonSerializable
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ProductApplication';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'request_no'      => 'string',
        'out_request_no'  => 'string',
        'ent_id'          => 'string',
        'status'          => 'string',
        'product_details' => '\Entpay\Mse\Client\Model\AccountDetail[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'request_no'      => null,
        'out_request_no'  => null,
        'ent_id'          => null,
        'status'          => null,
        'product_details' => null,
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'request_no'      => 'request_no',
        'out_request_no'  => 'out_request_no',
        'ent_id'          => 'ent_id',
        'status'          => 'status',
        'product_details' => 'product_details',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'request_no'      => 'setRequestNo',
        'out_request_no'  => 'setOutRequestNo',
        'ent_id'          => 'setEntId',
        'status'          => 'setStatus',
        'product_details' => 'setProductDetails',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'request_no'      => 'getRequestNo',
        'out_request_no'  => 'getOutRequestNo',
        'ent_id'          => 'getEntId',
        'status'          => 'getStatus',
        'product_details' => 'getProductDetails',
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
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

    const STATUS_INIT       = 'INIT';
    const STATUS_PROCESSING = 'PROCESSING';
    const STATUS_FINISH     = 'FINISH';

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    public $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['request_no']      = isset($data['request_no']) ? $data['request_no'] : null;
        $this->container['out_request_no']  = isset($data['out_request_no']) ? $data['out_request_no'] : null;
        $this->container['ent_id']          = isset($data['ent_id']) ? $data['ent_id'] : null;
        $this->container['status']          = isset($data['status']) ? $data['status'] : null;
        $this->container['product_details'] = isset($data['product_details']) ? $data['product_details'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (null === $this->container['request_no']) {
            $invalidProperties[] = "'request_no' can't be null";
        }
        if ((mb_strlen($this->container['request_no']) > 64)) {
            $invalidProperties[] = "invalid value for 'request_no', the character length must be smaller than or equal to 64.";
        }

        if ((mb_strlen($this->container['request_no']) < 1)) {
            $invalidProperties[] = "invalid value for 'request_no', the character length must be bigger than or equal to 1.";
        }

        if (null === $this->container['out_request_no']) {
            $invalidProperties[] = "'out_request_no' can't be null";
        }
        if ((mb_strlen($this->container['out_request_no']) > 64)) {
            $invalidProperties[] = "invalid value for 'out_request_no', the character length must be smaller than or equal to 64.";
        }

        if ((mb_strlen($this->container['out_request_no']) < 1)) {
            $invalidProperties[] = "invalid value for 'out_request_no', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['ent_id']) && (mb_strlen($this->container['ent_id']) > 64)) {
            $invalidProperties[] = "invalid value for 'ent_id', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['ent_id']) && (mb_strlen($this->container['ent_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'ent_id', the character length must be bigger than or equal to 1.";
        }

        if (null === $this->container['status']) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ((mb_strlen($this->container['status']) > 20)) {
            $invalidProperties[] = "invalid value for 'status', the character length must be smaller than or equal to 20.";
        }

        if ((mb_strlen($this->container['status']) < 1)) {
            $invalidProperties[] = "invalid value for 'status', the character length must be bigger than or equal to 1.";
        }

        if (null === $this->container['product_details']) {
            $invalidProperties[] = "'product_details' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets request_no.
     *
     * @return string
     */
    public function getRequestNo()
    {
        return $this->container['request_no'];
    }

    /**
     * Sets request_no.
     *
     * @param string $request_no 微企付入驻申请单号
     *
     * @return self
     */
    public function setRequestNo($request_no)
    {
        $this->container['request_no'] = $request_no;

        return $this;
    }

    /**
     * Gets out_request_no.
     *
     * @return string
     */
    public function getOutRequestNo()
    {
        return $this->container['out_request_no'];
    }

    /**
     * Sets out_request_no.
     *
     * @param string $out_request_no 业务申请编号
     *
     * @return self
     */
    public function setOutRequestNo($out_request_no)
    {
        $this->container['out_request_no'] = $out_request_no;

        return $this;
    }

    /**
     * Gets ent_id.
     *
     * @return string|null
     */
    public function getEntId()
    {
        return $this->container['ent_id'];
    }

    /**
     * Sets ent_id.
     *
     * @param string|null $ent_id 企业ID
     *
     * @return self
     */
    public function setEntId($ent_id)
    {
        $this->container['ent_id'] = $ent_id;

        return $this;
    }

    /**
     * Gets status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status.
     *
     * @param string $status 入驻状态
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets product_details.
     *
     * @return \Entpay\Mse\Client\Model\AccountDetail[]
     */
    public function getProductDetails()
    {
        return $this->container['product_details'];
    }

    /**
     * Sets product_details.
     *
     * @param \Entpay\Mse\Client\Model\AccountDetail[] $product_details 入驻详细信息
     *
     * @return self
     */
    public function setProductDetails($product_details)
    {
        $this->container['product_details'] = $product_details;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
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
     * @param int $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @see https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource
     */
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object.
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

    /**
     * Gets a header-safe presentation of the object.
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }

    /**
     * Create request for operation 'create'.
     *
     * @param \Entpay\Mse\Client\Model\ProductApplicationParam $product_application_param (required)
     * @param \Entpay\Mse\Client\Config\RequestOptions         $request_options           (optional)
     *
     * @throws \InvalidArgumentException
     * @return ProductApplication
     */
    public static function create($product_application_param, $request_options = null)
    {
        $path = '/v3/mse-pay/product-applications';

        return EntpayClient::getDefaultClient()->doRequest(
            'POST',
            $path,
            $product_application_param,
            ProductApplication::class,
            $request_options
        );
    }

    /**
     * Create request for operation 'createLink'.
     *
     * @param string                                   $request_no      (required)
     * @param \Entpay\Mse\Client\Config\RequestOptions $request_options (optional)
     *
     * @throws \InvalidArgumentException
     * @return AccountLink
     */
    public static function createLink($request_no, $request_options = null)
    {
        $path = sprintf('/v3/mse-pay/product-applications/%s/links', urlencode($request_no));

        return EntpayClient::getDefaultClient()->doRequest(
            'POST',
            $path,
            null,
            AccountLink::class,
            $request_options
        );
    }

    /**
     * Create request for operation 'retrieve'.
     *
     * @param string                                   $request_no      (required)
     * @param \Entpay\Mse\Client\Config\RequestOptions $request_options (optional)
     *
     * @throws \InvalidArgumentException
     * @return ProductApplication
     */
    public static function retrieve($request_no, $request_options = null)
    {
        $path = sprintf('/v3/mse-pay/product-applications/%s', urlencode($request_no));

        return EntpayClient::getDefaultClient()->doRequest(
            'GET',
            $path,
            null,
            ProductApplication::class,
            $request_options
        );
    }

    /**
     * Create request for operation 'retrieveByOutRequestNo'.
     *
     * @param string                                   $out_request_no  (required)
     * @param \Entpay\Mse\Client\Config\RequestOptions $request_options (optional)
     *
     * @throws \InvalidArgumentException
     * @return ProductApplication
     */
    public static function retrieveByOutRequestNo($out_request_no, $request_options = null)
    {
        $path = sprintf('/v3/mse-pay/product-applications/out-request-no/%s', urlencode($out_request_no));

        return EntpayClient::getDefaultClient()->doRequest(
            'GET',
            $path,
            null,
            ProductApplication::class,
            $request_options
        );
    }
}
