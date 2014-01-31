<?php

namespace GER\Bundle\AmazonBundle\Twig;

class AmazonExtension extends \Twig_Extension {

	public function getFilters()
	{
       return array(
        'amazonRecordSet' =>  new \Twig_Filter_Method($this, 'amazonRecordSet')
        );
   }

   public function amazonRecordSet($recordSet)
   {
    if(preg_match("/\\\(\d{3})\..*/", $recordSet, $matches)) {
            $replace = "\\" . $matches[1];
            $recordSet = str_replace($replace, chr(base_convert((string)$matches[1], 8, 10)), $recordSet);
    }
    return $recordSet;

}

public function getName()
{
    return 'amazon_extension';
}

}