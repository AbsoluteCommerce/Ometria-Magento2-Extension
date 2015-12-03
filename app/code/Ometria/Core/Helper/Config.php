<?php
namespace Ometria\Core\Helper; 
use Magento\Framework\App\Helper\AbstractHelper; 
use Magento\Framework\App\Helper\Context; 
class Config extends AbstractHelper 
{
    protected $coreHelperMageConfig;

    public function __construct(
        Context $context,
        \Ometria\Core\Helper\MageConfig $coreHelperMageConfig        
    )
    {
        $this->coreHelperMageConfig = $coreHelperMageConfig;    
        return parent::__construct($context);
    }
    
    public function isEnabled() {
        return $this->coreHelperMageConfig->get('ometria/general/enabled');
    }

    public function isDebugMode() {
        return $this->coreHelperMageConfig->get('ometria/advanced/debug');
    }

    // Is data layer configured?
    public function isUnivarEnabled() {
        return $this->coreHelperMageConfig->get('ometria/advanced/univar');
    }

    public function isPingEnabled() {
        return $this->coreHelperMageConfig->get('ometria/advanced/ping');
    }

    public function isScriptDeferred() {
        return $this->coreHelperMageConfig->get('ometria/advanced/scriptload');
    }

    public function getAPIKey($store_id=null) {
        if ($store_id) {
            return $this->coreHelperMageConfig->get('ometria/general/apikey', $store_id);
        } else {
            return $this->coreHelperMageConfig->get('ometria/general/apikey');
        }
    }

    public function isConfigured() {
        return $this->isEnabled() && $this->getAPIKey() != "";
    }

    public function log($message, $level = Zend_Log::DEBUG) {
        Mage::log($message, $level, "ometria.log");
    }
}
