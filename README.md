peridot-cloak-plugin
==========================

Cloak for [peridot-php](http://peridot-php.github.io/)

[![Latest Stable Version](https://poser.pugx.org/cloak/peridot-cloak-plugin/v/stable.svg)](https://packagist.org/packages/cloak/peridot-cloak-plugin)
[![Latest Unstable Version](https://poser.pugx.org/cloak/peridot-cloak-plugin/v/unstable.svg)](https://packagist.org/packages/cloak/peridot-cloak-plugin) [![License](https://poser.pugx.org/cloak/peridot-cloak-plugin/license.svg)](https://packagist.org/packages/cloak/peridot-cloak-plugin)

[![Build Status](https://travis-ci.org/cloak-php/peridot-cloak-plugin.svg?branch=master)](https://travis-ci.org/cloak-php/peridot-cloak-plugin)
[![HHVM Status](http://hhvm.h4cc.de/badge/cloak/peridot-cloak-plugin.svg)](http://hhvm.h4cc.de/package/cloak/peridot-cloak-plugin)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak-plugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cloak-php/peridot-cloak-plugin/?branch=master)
[![Coverage Status](https://coveralls.io/repos/cloak-php/peridot-cloak-plugin/badge.png?branch=master)](https://coveralls.io/r/cloak-php/peridot-cloak-plugin?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/5513fe99df7e7b09ef000515/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5513fe99df7e7b09ef000515)


Installation
------------------

Installation that uses the composer.

1. Install the [composer](https://getcomposer.org/).
2. Install the package.

		composer require cloak/peridot-cloak-plugin:1.1.2 --dev


Basic usage
------------------

It can be used by simply append the set to **peridot.php**.

```php
use cloak\peridot\CloakPlugin;

return function(EventEmitterInterface $emitter) {
    CloakPlugin::create('cloak.toml')->registerTo($emitter);
};
```
