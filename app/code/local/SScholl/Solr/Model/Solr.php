<?php
require_once Mage::getBaseDir('lib') . DS . 'Solarium' . DS . 'Autoloader.php';
require_once Mage::getBaseDir('lib') . DS . 'Symfony' . DS . 'Component' . DS .
	'EventDispatcher' . DS . 'EventDispatcherInterface.php';
require_once Mage::getBaseDir('lib') . DS . 'Symfony' . DS . 'Component' . DS .
	'EventDispatcher' . DS . 'EventDispatcher.php';
require_once Mage::getBaseDir('lib') . DS . 'Symfony' . DS . 'Component' . DS .
	'EventDispatcher' . DS . 'Event.php';
Solarium\Autoloader::register();

class SScholl_Solr_Model_Solr
{

	/**
	 * @return SScholl_Solr_Helper_Config
	 */
	protected function _config()
	{
		return Mage::helper('sschollsolr/config');
	}
	
	/**
	 * @var Solarium_Client
	 */
	private $_config	= array(
		'adapteroptions' => array(
		),
	);
	
	/**
	 * @var Solarium_Client
	 */
	private $_solarium	= null;
	
	/**
	 * @var Solarium_Query_Select
	 */
	private $_select	= null;
	
	public function __construct($number)
	{
		if ($number && $this->_config()->active($number)) {
			$this->_config['adapteroptions'] = array(
				'host' => $this->_config()->host($number),
				'port' => $this->_config()->port($number),
				'path' => $this->_config()->path($number),
			);
		}
	}
	
	/**
	 * @return Solarium_Query_Select
	 */
	public function getSolarium()
	{
		if (is_null($this->_solarium)) {
			$this->_solarium =  new Solarium\Client($this->_config);
		}
		return $this->_solarium;
	}
	
	/**
	 * @return Solarium_Query_Update
	 */
	public function getSelect()
	{
		if (is_null($this->_select)) {
			$this->_select = $this->getSolarium()->createSelect();
		}
		return $this->_select;
	}
	
	/**
	 * @return Solarium_Query_Update
	 */
	public function createSelect()
	{
		return $this->getSolarium()->createSelect();;
	}
	
}