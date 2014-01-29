<?php
/**
 * Fuel Sms
 *
 * @package     Fuel
 * @subpackage  Sms
 * @version     1.0
 * @author      Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license     MIT License
 * @copyright   2013 - 2014 Indigo Development Team
 * @link        https://indigophp.com
 */

namespace Sms;

use Indigo\Sms\Gateway\GatewayInterface;
use Indigo\Sms\Message;

class Sms
{
	/**
	 * Array of Gateway instances
	 *
	 * @var array
	 */
	protected static $_instances = array();

	/**
	 * Init
	 */
	public static function _init()
	{
		\Config::load('sms', true);
	}

	/**
	 * Forge and return new instance
	 *
	 * @param  string $gateway Gateway name
	 * @return GatewayInterface
	 */
	public static function forge($gateway = null, GatewayInterface $instance = null)
	{
		if (is_null($instance)) {
			is_null($gateway) and $gateway = \Config::get('sms.default');
			$instance = \Config::get('sms.gateway.' . $gateway);

			if ( ! $instance instanceof GatewayInterface)
			{
				throw new \InvalidArgumentException('Invalid Gateway');
			}
		}

		return static::$_instances[$gateway] = $instance;
	}

	/**
	 * Return a gateway instance
	 *
	 * @param  string $gateway Gateway name
	 * @return GatewayInterface
	 */
	public static function instance($gateway = null)
	{
		if (array_key_exists($gateway, static::$_instances))
		{
			$gateway = static::$_instances[$gateway];
		}
		else
		{
			$gateway = static::forge($gateway);
		}

		return $gateway;
	}

	public static function message($number, $message, $sender = null)
	{
		return new Message($number, $message, $sender);
	}

	/**
	 * class constructor
	 *
	 * @param   void
	 * @access  private
	 * @return  void
	 */
	final private function __construct() {}
}
