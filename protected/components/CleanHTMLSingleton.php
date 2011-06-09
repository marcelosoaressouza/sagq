<?php
class CleanHTMLSingleton extends CApplicationComponent
{
    public $purify_options = array('URI.AllowedSchemes'=>array('http' => true,'https' => true,));
    
    public function cleanAll($content, $size = 128)
    {
        $purify = new CHtmlPurifier($this->purify_options);
        
        return $purify->purify(substr(strip_tags(html_entity_decode(substr($content, 0, $size))), 0, $size));
    }

}

?>
