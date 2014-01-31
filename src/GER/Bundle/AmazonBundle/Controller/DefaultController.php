<?php

namespace GER\Bundle\AmazonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function getDomainsAction()
	{


		$aws = $this->get('ger_amazon.aws.factory')->getFactory();
		
		$route53_client = $aws->get('route53');
		$hosted_zones = $route53_client->listHostedZones();
	
		$domains = array();

		$domain_table = function($key, $data) use ($route53_client, &$domains) {
			if($key == 'HostedZones') {
				$hosted_zones_array = $data;
				foreach($hosted_zones_array as $zone) {
					$domains[$zone['Id']]['generals'] = $route53_client->getHostedZone(array(
						'Id' => $zone['Id']
					))->toArray();

					$domains[$zone['Id']]['recordSets'] = $route53_client->listResourceRecordSets(array(
						'HostedZoneId' => $zone['Id']
					))->toArray();
				}
			}
			return ;
		};
		$hosted_zones->map($domain_table);

		return $this->render('GERAmazonBundle:Default:domains.html.twig', array('domains' => $domains));
	}

	public function getElasticIpsAction() {

		$aws = $this->get('ger_amazon.aws.factory')->getFactory();
		$ec2_client = $aws->get('ec2');

		$addresses = array();
		
		$addresses = $ec2_client->DescribeAddresses()->toArray();

				return $this->render('GERAmazonBundle:Default:elastic_ips.html.twig', array('addresses' => $addresses));
	}
}
