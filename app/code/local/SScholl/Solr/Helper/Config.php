<?php /**************** Copyright notice ************************
 *  (c) 2011 Simon Eric Scholl <simon@sdscholl.de>
 *  All rights reserved
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 ***************************************************************/

class SScholl_Solr_Helper_Config
{
    
    /**
     * contains the xml path to section
     * @var string
     */
    const SECTION = 'sschollsolr';
    
    /**
     * contains the xml path to group solr 
     * @var string
     */
    const GROUP_SOLR_ = '/solr_';
    
    /**
     * contains the xml path to field active
     * @var string
     */
    const FIELD_ACTIVE = '/active';
    
    /**
     * contains the xml path to field name
     * @var string
     */
    const FIELD_NAME = '/name';
    
    /**
     * contains the xml path to field host
     * @var string
     */
    const FIELD_HOST = '/host';
    
    /**
     * contains the xml path to field port
     * @var string
     */
    const FIELD_PORT = '/port';
    
    /**
     * contains the xml path to field path
     * @var string
     */
    const FIELD_PATH = '/path';

    /**
     * returns the configured active flag by solr number
     * @return bool
     */
    public function active($number)
    {
        return (bool) Mage::getStoreConfig(self::SECTION . self::GROUP_SOLR_ . $number . self::FIELD_ACTIVE);
    }

    /**
     * returns the configured name by solr number
     * @return string
     */
    public function name($number)
    {
        return (string) Mage::getStoreConfig(self::SECTION . self::GROUP_SOLR_ . $number . self::FIELD_NAME);
    }

    /**
     * returns the configured host by solr number
     * @return string
     */
    public function host($number)
    {
        return (string) Mage::getStoreConfig(self::SECTION . self::GROUP_SOLR_ . $number . self::FIELD_HOST);
    }

    /**
     * returns the configured Port by solr number
     * @return int
     */
    public function port($number)
    {
        return (int) Mage::getStoreConfig(self::SECTION . self::GROUP_SOLR_ . $number . self::FIELD_PORT);
    }

    /**
     * returns the configured active flag by solr number
     * @return string
     */
    public function path($number)
    {
        return (string) Mage::getStoreConfig(self::SECTION . self::GROUP_SOLR_ . $number . self::FIELD_PATH);
    }
    
}