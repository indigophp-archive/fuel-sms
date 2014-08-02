<?php

/*
 * This file is part of the Fuel SMS package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Fuel;

use Indigo\Sms\Gateway\GatewayInterface;
use Indigo\Sms\Message;
use InvalidArgumentException;

/**
 * Sms Facade class
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Sms extends \Facade
{
    use \Indigo\Core\Facade\Instance;

    protected static $_config = 'sms';

    /**
	 * {@inheritdocs}
	 *
	 * @param string $gateway
	 *
	 * @return GatewayInterface
	 */
    public static function forge($instance = 'default')
    {
        $gateway = \Config::get('sms.' . $instance);

        if ($gateway instanceof GatewayInterface === false) {
            throw new InvalidArgumentException('Invalid Gateway');
        }

        return static::newInstance($instance, $gateway);
    }

    /**
	 * Create a new message
	 *
	 * @param mixed  $number
	 * @param string $message
	 * @param mixed  $sender
	 *
	 * @return Message
	 */
    public static function message($number, $message, $sender = null)
    {
        return new Message($number, $message, $sender);
    }
}
