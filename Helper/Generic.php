<?php

namespace Hevelop\StripeGraphQl\Helper;

use Magento\Framework\Exception\CouldNotSaveException;
use StripeIntegration\Payments\Helper\Generic as Original;

class Generic extends Original
{
    /**
     * @param $msg
     * @param \Exception|null $e
     * @throws CouldNotSaveException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function dieWithError($msg, $e = null)
    {
        $this->logError($msg);

        if ($e && !$this->isAuthenticationRequiredMessage($e->getMessage())) {
            if ($e->getMessage() != $msg) {
                $this->logError($e->getMessage());
            }

            $this->logError($e->getTraceAsString());
        }

        if ($this->isAdmin()) {
            throw new CouldNotSaveException(__($msg));
        } elseif ($this->isApi() || $this->isAjaxRequest()) {
            throw new CouldNotSaveException(__($this->cleanError($msg)), $e);
        } elseif ($this->isMultiShipping()) {
            throw new \Magento\Framework\Exception\LocalizedException(__($msg), $e);
        } else {
            $this->addError($this->cleanError($msg));
        }
    }

    public function isApi()
    {
        return $this->isApiRest() || $this->isApiGraphql();
    }

    public function isApiRest()
    {
        return strpos($this->requestInterface->getPathInfo(), '/rest') !== false;
    }

    public function isApiGraphql()
    {
        return strpos($this->requestInterface->getPathInfo(), '/graphql') !== false;
    }
}
