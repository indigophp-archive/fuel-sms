<?php
/**
 * Fuel Sms
 *
 * @package 	Fuel
 * @subpackage	Sms
 * @version 	1.0
 * @author		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @copyright	2013 - 2014 Indigo Development Team
 * @link		https://indigophp.com
 */

namespace Sms;

use Indigo\Sms\Gateway\GatewayInterface;
use Indigo\Sms\Message;

class Sms extends \Forge
{
	protected static $_config = 'sms';

	/**
	 * {@inheritdocs}
	 *
	 * @param  string           $gateway
	 * @param  GatewayInterface $instance
	 * @return GatewayInterface
	 */
	public static function forge($gateway = null, GatewayInterface $instance = null)
	{
		if (is_null($instance))
		{
			is_null($gateway) and $gateway = \Config::get('sms.default', 'default');
			$instance = \Config::get('sms.gateway.' . $gateway);

			if ( ! $instance instanceof GatewayInterface)
			{
				throw new \InvalidArgumentException('Invalid Gateway');
			}
		}

		return static::newInstance($gateway, $instance);
	}

	/**
	 * Create a new message
	 *
	 * @param  mixed   $number
	 * @param  string  $message
	 * @param  mixed   $sender
	 * @return Message
	 */
	public static function message($number, $message, $sender = null)
	{
		return new Message($number, $message, $sender);
	}
}
