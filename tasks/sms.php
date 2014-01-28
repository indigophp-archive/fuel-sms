<?php

namespace Fuel\Tasks;

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
	 *
	 * @param integer $number
	 */
	public function run($number, $message, $sender = null)
	{
		$message = \Sms::message($number, $message, $sender);

		$this->gateway->send($message);
	}

	public function balance()
	{
		return $this->gateway->getBalance();
	}
}
