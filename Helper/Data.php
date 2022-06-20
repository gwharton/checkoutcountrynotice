<?php
namespace Gw\CheckoutCountryNotice\Helper;

use Exception;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Store\Model\ScopeInterface;

class Data
{
    const XML_PATH_DEFAULT_NOTICE = 'checkout/countrynotice/default';
    const XML_PATH_COUNTRY_GROUPS = 'checkout/countrynotice/countrygroups';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param SerializerInterface $serializer
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        SerializerInterface $serializer
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->serializer = $serializer;
    }

    /**
     * @param int $storeId
     * @return array
     */
    public function getCountryGroups(int $storeId): array
    {
        try {
            return $this->serializer->unserialize(
                $this->scopeConfig->getValue(
                    self::XML_PATH_COUNTRY_GROUPS,
                    ScopeInterface::SCOPE_STORE,
                    $storeId
                )
            );
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @param int $storeId
     * @return string|null
     */
    public function getDefaultNotice(int $storeId): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_DEFAULT_NOTICE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
