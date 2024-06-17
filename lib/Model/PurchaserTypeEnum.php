<?php
/**
 * PurchaserTypeEnum.
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
 * PurchaserTypeEnum Class Doc Comment.
 *
 * @category Class
 * @author   Tencent Business Enterprise Pay Team
 * @see     https://business.tenpay.com
 */
class PurchaserTypeEnum
{
    /**
     * 个人用户.
     */
    const INDIVIDUAL = 'INDIVIDUAL';

    /**
     * 个人付款卡号.
     */
    const INDIVIDUAL_CARD = 'INDIVIDUAL_CARD';

    /**
     * 个人付款人姓名.
     */
    const INDIVIDUAL_NAME = 'INDIVIDUAL_NAME';

    /**
     * 企业.
     */
    const ENTERPRISE = 'ENTERPRISE';

    /**
     * Gets allowable values of the enum.
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::INDIVIDUAL,
            self::INDIVIDUAL_CARD,
            self::INDIVIDUAL_NAME,
            self::ENTERPRISE,
        ];
    }
}
