<?php

/*
 * This file is part of the MobileDetectBundle.
 *
 * (c) Nikolay Ivlev <nikolay.kotovsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SunCat\MobileDetectBundle\DeviceDetector;

use Detection\MobileDetect;

/**
 * MobileDetector class
 *
 * @author suncat2000 <nikolay.kotovsky@gmail.com>
 *
 */
class MobileDetector extends MobileDetect
{
	public function __construct($container)
	{
		$headers = $container->get("request")->headers;
		$formattedHeaders = array();
		foreach ($headers->all() as $key => $header) {
			$formattedHeaders['HTTP_'.strtoupper($key)] = implode(';', $header);
		}
		\Mobile_Detect::__construct($formattedHeaders, $headers->get('User-Agent'));
	}
}
