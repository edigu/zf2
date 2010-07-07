<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_LDAP
 * @subpackage Schema
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @namespace
 */
namespace Zend\LDAP\Node\Schema\AttributeType;

use Zend\LDAP\Node\Schema\AttributeType,
    Zend\LDAP\Node\Schema;

/**
 * Zend_LDAP_Node_Schema_AttributeType_OpenLDAP provides access to the attribute type
 * schema information on an OpenLDAP server.
 *
 * @uses       \Zend\LDAP\Node\Schema\AttributeType
 * @uses       \Zend\LDAP\Node\Schema\Item
 * @category   Zend
 * @package    Zend_LDAP
 * @subpackage Schema
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class OpenLDAP extends Schema\Item implements AttributeType
{
    /**
     * Gets the attribute name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the attribute OID
     *
     * @return string
     */
    public function getOid()
    {
        return $this->oid;
    }

    /**
     * Gets the attribute syntax
     *
     * @return string
     */
    public function getSyntax()
    {
        if ($this->syntax === null) {
            $parent = $this->getParent();
            if ($parent === null) return null;
            else return $parent->getSyntax();
        } else {
            return $this->syntax;
        }
    }

    /**
     * Gets the attribute maximum length
     *
     * @return int|null
     */
    public function getMaxLength()
    {
        $maxLength = $this->{'max-length'};
        if ($maxLength === null) {
            $parent = $this->getParent();
            if ($parent === null) return null;
            else return $parent->getMaxLength();
        } else {
            return (int)$maxLength;
        }
    }

    /**
     * Returns if the attribute is single-valued.
     *
     * @return boolean
     */
    public function isSingleValued()
    {
        return $this->{'single-value'};
    }

    /**
     * Gets the attribute description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->desc;
    }

    /**
     * Returns the parent attribute type in the inhertitance tree if one exists
     *
     * @return \Zend\LDAP\Node\Schema\AttributeType\OpenLDAP|null
     */
    public function getParent()
    {
        if (count($this->_parents) === 1) {
            return $this->_parents[0];
        }
    }
}
