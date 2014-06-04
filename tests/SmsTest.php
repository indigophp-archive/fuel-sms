<?php

namespace Sms\Test;

use Sms\Sms;

/**
 * Tests for Sms
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Sms\Sms
 */
class SmsTest extends \PHPUnit_Framework_TestCase
{
	public function tearDown($value='')
	{
		\Mockery::close();
	}

	/**
	 * @covers ::forge
	 * @group  Sms
	 */
	public function testForge()
	{
		$mock = \Mockery::mock('Indigo\\Sms\\Gateway\\GatewayInterface');
		\Config::set('sms.gateway.default', $mock);

		$sms = Sms::forge('default');
		$this->assertInstanceOf('Indigo\\Sms\\Gateway\\GatewayInterface', $sms);
		\Config::delete('sms.gateway.default');

		$sms = Sms::forge('test', $mock);
		$this->assertSame($mock, $sms);
	}

	/**
	 * @covers            ::forge
	 * @expectedException InvalidArgumentException
	 * @group             Sms
	 */
	public function testForgeFailure()
	{
		$sms = Sms::forge();
	}

	/**
	 * @covers ::message
	 * @group  Sms
	 */
	public function testMessage()
	{
		$message = Sms::message(1234, 'Test');

		$this->assertInstanceOf('Indigo\\Sms\\Message', $message);
	}
}
