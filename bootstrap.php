<?php
/**
 * Fuel Sms
 *
 * @package 	Fuel
 * @subpackage	Sms
 * @version		1.0
 * @author 		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @copyright   2013 - 2014 Indigo Development Team
 * @link 		https://indigophp.com
 */

Autoloader::add_core_namespace('Sms');

Autoloader::add_classes(array(
    'Sms\\Sms' => __DIR__ . '/classes/sms.php',
));
