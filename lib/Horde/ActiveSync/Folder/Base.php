<?php
/**
 * Horde_ActiveSync_Folder_Base
 *
 * PHP Version 5
 *
 * @license   http://www.horde.org/licenses/gpl GPLv2
 * @copyright 2010-2012 Horde LLC (http://www.horde.org/)
 * @author    Michael J Rubinsky <mrubinsk@horde.org>
 * @link      http://pear.horde.org/index.php?package=ActiveSync
 * @package   ActiveSync
 */
/**
  * The class contains functionality for maintaining state for a generic
  * collection folder. This would include Appointments, Contacts, and Tasks.
  *
  * @license   http://www.horde.org/licenses/gpl GPLv2
  * @copyright 2012 Horde LLC (http://www.horde.org/)
  * @author    Michael J Rubinsky <mrubinsk@horde.org>
  * @link      http://pear.horde.org/index.php?package=ActiveSync
  * @package   ActiveSync
  */

abstract class Horde_ActiveSync_Folder_Base
{
    /**
     * The folder's current internal property state.
     *
     * @var array
     */
    protected $_status = array();

    /**
     * The server id for this folder.
     *
     * @var string
     */
    protected $_serverid;

    /**
     * The collection class.
     *
     * @var string
     */
    protected $_class;

    /**
     * Const'r
     *
     * @param string $serverid  The serverid of this folder.
     * @param string $class     The collection class.
     * @param array $status     Internal folder state.
     *
     * @return Horde_ActiveSync_Folder_Base
     */
    public function __construct(
        $serverid,
        $class,
        array $status = array())
    {
        $this->_serverid = $serverid;
        $this->_status = $status;
        $this->_class = $class;
    }

    public function serverid()
    {
        return $this->_serverid;
    }

    public function collectionClass()
    {
        return $this->_class;
    }

    public function setStatus(array $status)
    {
        $this->_status = $status;
    }

    /**
     * Updates the internal UID cache, and clears the internal
     * update/deleted/changed cache.
     */
    abstract public function updateState();

    /**
     * Serialize this object.
     *
     * @return string  The serialized data.
     */
    abstract public function serialize();

    /**
     * Reconstruct the object from serialized data.
     *
     * @param string $data  The serialized data.
     */
    abstract public function unserialize($data);

}
