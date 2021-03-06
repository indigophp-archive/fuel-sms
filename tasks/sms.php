<?php

/*
 * This file is part of the Fuel SMS package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Tasks;

/**
 * Sms Task
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Sms
{
	protected $gateway;

	public function __construct()
	{
		$gateway = \Cli::option('gateway', \Cli::option('g'));
		$this->gateway = \Sms::forge($gateway);
	}

	/**
	 * Send a message
	 */
	public function run($number, $message, $sender = null)
	{
		$message = \Sms::message($number, $message, $sender);

		$this->gateway->send($message);
	}

	/**
	 * Get balance
	 *
	 * @return float
	 */
	public function balance()
	{
		return $this->gateway->getBalance();
	}
}
