<?php
/**
 * PickTypeEnum.
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

namespace Entpay\Mse\Client\Model;

/**
 * PickTypeEnum Class Doc Comment.
 *
 * @category Class
 * @author   Tencent Business Enterprise Pay Team
 * @see     https://business.tenpay.com
 */
class PickTypeEnum
{
    /**
     * 自提.
     */
    const SELF_PICK = 'SELF_PICK';

    /**
     * 物流
     */
    const LOGISTICS = 'LOGISTICS';

    /**
     * 改归属.
     */
    const CHANGE_OWNER = 'CHANGE_OWNER';

    /**
     * Gets allowable values of the enum.
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SELF_PICK,
            self::LOGISTICS,
            self::CHANGE_OWNER,
        ];
    }
}
