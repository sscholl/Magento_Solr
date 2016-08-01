<?php /**************** Copyright notice ************************
 *  (c) 2011 Simon Eric Scholl <simon@sdscholl.de>
 *  All rights reserved
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 ***************************************************************/

class SScholl_Solr_Model_Adminhtml_System_Config_Source_Servers
	extends SScholl_Solr_Model_Abstract
{
	
	public function toOptionArray()
	{
		$this->_array = array(
			array('value' => 0, 'label' => Mage::helper('adminhtml')->__('---')),
		);
		for ($i = 1; $i <= 5; ++ $i) {
			//TODO: add translation
			if ( ($name = $this->_config($i)->name($i)) ) {
				$label = " $i: $name";
			} else {
				$label = "$i: Solr Server";
			}
			if (!$this->_config()->active($i)) {
				$label .= ' (inactive)';
			}
			if (
				($host = $this->_config()->host($i))
				&& ($port = $this->_config()->port($i))
				&& ($path = $this->_config()->path($i))
			) {
				$label .= " ($host" . ':' . $port . "$path)";
			}
			$this->_array[] = array(
				'value' => $i, 
				'label' => $label,
			);
		}
		return $this->_array;
	}
	
}