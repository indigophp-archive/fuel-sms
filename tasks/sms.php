<?php

namespace Fuel\Tasks;

class Sms
{
	/**
	 * Send a message
	 *
	 * @param integer $number
	 */
	public function run($number, $message, $sender = null)
	{
		$gateway = \Cli::option('gateway', \Cli::option('g'));
		$gateway = \Sms::forge($gateway);

		$message = \Sms::message($number, $message, $sender);

		$gateway->send($message);
	}
}
