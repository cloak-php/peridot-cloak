peridot-cloak
==========================

Cloak for [peridot](http://peridot-php.github.io/)

[![Build Status](https://travis-ci.org/cloak-php/peridot-cloak.svg?branch=master)](https://travis-ci.org/cloak-php/peridot-cloak)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak/?branch=master)
[![Coverage Status](https://coveralls.io/repos/cloak-php/peridot-cloak/badge.png?branch=master)](https://coveralls.io/r/cloak-php/peridot-cloak?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/54702dbf9dcf6ddad5000945/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54702dbf9dcf6ddad5000945)


Installation
------------------

Installation that uses the composer

Please add the following items to composer.json.  
Then please run the composer install.

```php
{
    "require-dev": {
        "cloak/peridot-cloak": "1.0.1"
    }
}
```

Basic usage
------------------

It can be used by simply append the set to **peridot.php**.

```php
use cloak\peridot\CloakPlugin;

return function(EventEmitterInterface $emitter) {
    CloakPlugin::create('cloak.toml')->registerTo($emitter);
};
```
