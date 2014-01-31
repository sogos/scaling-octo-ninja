<?php 

namespace GER\Bundle\AmazonBundle\Provider;

use Aws\Common\Aws;

class AmazonAwsFactoryProvider {

    private $aws;

    public function __construct($aws_access_key_id, $aws_access_secret, $aws_default_region)
    {
        $this->aws = Aws::factory(array(
            'key'    => $aws_access_key_id,
            'secret' => $aws_access_secret,
            'region' => $aws_default_region
            ));
    }

    public function getFactory() {
        return $this->aws;
    }

}