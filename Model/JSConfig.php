<?php
namespace Gw\CheckoutCountryNotice\Model;

use Gw\CheckoutCountryNotice\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;

class JSConfig
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var Data
     */
    private $helper;

    /**
     * @param StoreManagerInterface $storeManager
     * @param Data $helper
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        Data $helper
    ) {
        $this->storeManager = $storeManager;
        $this->helper = $helper;
    }

    /**
     * @return array
     */
    public function getComponentConfig()
    {
        $storeId = $this->storeManager->getStore()->getId();
        return [
            'countryGroups' => $this->helper->getCountryGroups($storeId),
            'storeId' => $storeId,
            'defaultNotice' => $this->helper->getDefaultNotice($storeId),
            'additionalClasses' => 'gw_checkoutcountrynotice_country_id',
        ];
    }
}
