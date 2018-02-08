AllMYSMSBUndle
==============

This bundle provides AllMYSMS Library as symfony service.

It is compatible and tested with PHP 5.5, 5.6, 7.0, 7.1, on Symfony 3.* and 4.*.

Documentation
-------------

### Installation with Symfony Flex

Use the composer command in your Symfony Flex project :

```
composer req allmysms
```

### Installation Symfony 2.x, 3.x

Install the bundle

```composer require zephyr/allmysms-bundle```

Add the bundle to AppKernel

```php
<?php
//...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...            
            new ZephyrHQ\AllMySMSBundle\ZephyrHQAllMySMSBundle(),
            // ...
        ];
    }
    // ...
}
```

Add this configuration to config.yml

```yaml
zephyrhq_allmysms:
    api_login: '%env(ALLMYSMS_LOGIN)%'
    api_key: '%env(ALLMYSMS_KEY)%'
    simulate: '%env(ALLMYSMS_SIMULATE)%'
    simple_sms: false
```


Support
-------

Please consider [opening a question on StackOverflow](http://stackoverflow.com/questions/ask) using the [`allmysms` tag](http://stackoverflow.com/questions/tagged/allmysms).

Github Issues are dedicated to bug reports and feature requests.

Contributing
------------

See the [CONTRIBUTING](CONTRIBUTING.md) file.

Credits
-------

* Zephyr Web <dev@zephyr-web.fr>
* [All contributors](https://github.com/ZephyrHQ/AllMySMSBundle/graphs/contributors)

License
-------

This bundle is under the MIT license.  
For the whole copyright, see the [LICENSE](LICENSE) file distributed with this source code.
