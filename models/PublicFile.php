<?php

/**
 * PublicFile is the base class for all files that are directly accesible by web server.
 *
 * @author rifaideen
 */
class PublicFile extends File
{
    /**
     * Name of the folder where public files are stored
     */
    protected $folder_uploads = "album";
    
    /**
     * Get Uploaded File Url
     */
    public function getUrl($suffix = "")
    {
        return Yii::app()->baseUrl.'/uploads/'.$this->folder_uploads.'/'.$this->guid.'/'.$this->file_name;
    }
    
    /**
     * Before saving image create album folder if does not exists.
     */
    public function beforeSave() 
    {
        
        $path = Yii::getPathOfAlias('webroot') .
                DIRECTORY_SEPARATOR . "uploads" .
                DIRECTORY_SEPARATOR . $this->folder_uploads;
        if (!is_dir($path)) {
            mkdir($path,0777,true);
        }
        
        return parent::beforeSave();
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return File the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
