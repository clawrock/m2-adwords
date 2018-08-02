<?php

namespace ClawRock\AdWords\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    const XML_PATH_ENABLE           = 'clawrock_adwords/general/enable';
    const XML_PATH_CONVERSION_ID    = 'clawrock_adwords/general/conversion_id';
    const XML_PATH_CONVERSION_LABEL = 'clawrock_adwords/general/conversion_label';
    const XML_PATH_GLOBAL_TAG       = 'clawrock_adwords/general/add_global_tag';

    public function isEnable($store = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLE, ScopeInterface::SCOPE_STORE, $store);
    }

    public function getConversionId($store = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CONVERSION_ID, ScopeInterface::SCOPE_STORE, $store);
    }

    public function getConversionLabel($store = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CONVERSION_LABEL, ScopeInterface::SCOPE_STORE, $store);
    }

    public function isGlobalTagEnabled($store = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_GLOBAL_TAG, ScopeInterface::SCOPE_STORE, $store);
    }
}
