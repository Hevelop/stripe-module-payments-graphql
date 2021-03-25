<?php
/**
 * Copyright © Hevelop srl. All rights reserved.
 * @license https://opensource.org/licenses/agpl-3.0  AGPL-3.0 License
 * @author Samuele Martini <samuele.martini@hevelop.com>
 * @copyright Copyright (c) 2021 Hevelop srl (https://hevelop.com)
 * @package Hevelop_StripeGraphQl
 */

namespace Hevelop\StripeGraphQl\Model;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\QuoteGraphQl\Model\Cart\Payment\AdditionalDataProviderInterface;

/**
 * Format Stripe input into value expected when setting payment method
 */
class StripeAdditionalDataProvider implements AdditionalDataProviderInterface
{
    private const PATH_ADDITIONAL_DATA = 'stripe';
    private const CC_SAVE = 'cc_save';
    private const CC_STRIPEJS_TOKEN = 'cc_stripejs_token';

    /**
     * Format Stripe input into value expected when setting payment method
     * @param array $args
     * @return array
     * @throws GraphQlInputException
     */
    public function getData(array $args): array
    {
        if (isset($args[self::PATH_ADDITIONAL_DATA]) && !isset($args[self::PATH_ADDITIONAL_DATA][self::CC_STRIPEJS_TOKEN])) {
            throw new GraphQlInputException(
                __('Required parameter "cc_stripejs_token" for "stripe" is missing.')
            );
        }
        if (isset($args[self::PATH_ADDITIONAL_DATA]) && !isset($args[self::PATH_ADDITIONAL_DATA][self::CC_SAVE])) {
            $args[self::PATH_ADDITIONAL_DATA][self::CC_SAVE] = false;
        }

        return $args[self::PATH_ADDITIONAL_DATA] ?? [];
    }
}
