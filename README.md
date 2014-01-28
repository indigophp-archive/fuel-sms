# Fuel Sms

This package is a wrapper around [indigophp/sms](https://github.com/indigophp/sms) package.


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/fuel-sms": "@stable"
    }
}
```

## Usage

1.Update your `config/sms.php`

``` php
/**
 * Default gateway
 */
'default' => 'default',

/**
 * Gateway instances
 */
'gateway' => array(
    'default' => function () {
        return new Indigo\Sms\Gateway\SomeGateway;
    }
),
```

2.Create gateway instance

``` php
\Sms::forge('default');
```

3.Send message from `oil`

``` bash
oil r sms --gateway=gateway number "message"
```

## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/fuel-sms/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/fuel-sms/blob/develop/LICENSE) for more information.