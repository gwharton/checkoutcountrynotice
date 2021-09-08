<?php
namespace Gw\CheckoutCountryNotice\Block\Adminhtml;

use Exception;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray as FormAbstractFieldArray;
use Magento\Framework\Data\Form\Element\AbstractElement;

class CountryGroups extends FormAbstractFieldArray
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->setTemplate('config/form/field/array.phtml');
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
        $this->addColumn('countrylist', ['label' => __('Country List')]);
        $this->addColumn('notice', ['label' => __('Notice')]);
        parent::_construct();
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $this->setElement($element);
        return $this->_toHtml();
    }
}
