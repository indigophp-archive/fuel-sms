<?php

namespace Indigo\Fuel;

use Codeception\TestCase\Test;

/**
 * Tests for Sms
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Fuel\Sms
 * @group              Sms
 */
class SmsTest extends Test
{
	public function _before()
	{
		Sms::_init();

		\Config::set('sms.test', \Mockery::mock('Indigo\\Sms\\Gateway\\GatewayInterface'));
	}
	/**
	 * @covers ::forge
	 */
	public function testForge()
	{
		$sms = Sms::forge('test');
		$this->assertInstanceOf('Indigo\\Sms\\Gateway\\GatewayInterface', $sms);
	}

	/**
	 * @covers            ::forge
	 * @expectedException InvalidArgumentException
	 */
	public function testForgeFailure()
	{
		$sms = Sms::forge('THIS_SHOULD_NEVER_EXIST');
	}

	/**
	 * @covers ::message
	 */
	public function testMessage()
	{
		$message = Sms::message(1234, 'Test');

		$this->assertInstanceOf('Indigo\\Sms\\Message', $message);
	}
}
