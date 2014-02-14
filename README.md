# Fuel Sms

**This package is a wrapper around [indigophp/sms](https://github.com/indigophp/sms) package.**


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

``` php
\Sms::forge('default');
```

Send message from `oil`

``` bash
$ oil r sms --gateway=gateway number "message"
```


## Configuration

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


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/fuel-sms/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/fuel-sms/blob/develop/LICENSE) for more information.