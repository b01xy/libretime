<?php

require_once 'StorageBackend.php';
require_once 'Amazon_S3.php';

/**
 * 
 * Controls access to the storage backend class where a file is stored.
 *
 */
class ProxyStorageBackend extends StorageBackend
{
    private $storageBackend;
    
    /**
     * Receives the file's storage backend and instantiates the approriate
     * object.
     */
    public function ProxyStorageBackend($storageBackend)
    {
        $CC_CONFIG = Config::getConfig();
        
        $this->storageBackend = new $storageBackend($CC_CONFIG[$storageBackend]);
    }
    
    public function getAbsoluteFilePath($resourceId)
    {
        return $this->storageBackend->getAbsoluteFilePath($resourceId);
    }
    
    public function getSignedURL($resourceId)
    {
        return $this->storageBackend->getSignedURL($resourceId);
    }
    
    public function getFileSize($resourceId)
    {
        return $this->storageBackend->getFileSize($resourceId);
    }
    
    public function deletePhysicalFile($resourceId)
    {
        $this->storageBackend->deletePhysicalFile($resourceId);
    }
    
    public function deleteObjects()
    {
        $this->storageBackend->deleteObjects();
    }

}
