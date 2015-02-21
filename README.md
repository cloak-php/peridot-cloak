peridot-cloak
==========================

Cloak for [peridot](http://peridot-php.github.io/)

[![Latest Stable Version](https://poser.pugx.org/cloak/peridot-cloak/v/stable.svg)](https://packagist.org/packages/cloak/peridot-cloak) [![Total Downloads](https://poser.pugx.org/cloak/peridot-cloak/downloads.svg)](https://packagist.org/packages/cloak/peridot-cloak) [![Latest Unstable Version](https://poser.pugx.org/cloak/peridot-cloak/v/unstable.svg)](https://packagist.org/packages/cloak/peridot-cloak) [![License](https://poser.pugx.org/cloak/peridot-cloak/license.svg)](https://packagist.org/packages/cloak/peridot-cloak)

[![Build Status](https://travis-ci.org/cloak-php/peridot-cloak.svg?branch=master)](https://travis-ci.org/cloak-php/peridot-cloak)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak/?branch=master)
[![Coverage Status](https://coveralls.io/repos/cloak-php/peridot-cloak/badge.png?branch=master)](https://coveralls.io/r/cloak-php/peridot-cloak?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/54702dbf9dcf6ddad5000945/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54702dbf9dcf6ddad5000945)


Installation
------------------

Installation that uses the composer.

1. Install the [composer](https://getcomposer.org/).
2. Install the package.

		composer require cloak/peridot-cloak:1.1.1 --dev


Basic usage
------------------

It can be used by simply append the set to **peridot.php**.

```php
use cloak\peridot\CloakPlugin;

return function(EventEmitterInterface $emitter) {
    CloakPlugin::create('cloak.toml')->registerTo($emitter);
};
```
