<?php

/**
 * This file is part of peridot-cloak package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace cloak\peridot;

use Evenement\EventEmitterInterface;
use Peridot\Console\Environment;
use Peridot\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * Class CloakPlugin
 * @package cloak\peridot
 */
class CloakPlugin implements RegistrarInterface
{

    /**
     * @return CloakPlugin
     */
    public static function create()
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    public function register(EventEmitterInterface $emitter)
    {
        $emitter->on(self::START_EVENT, [$this, 'onPeridotStart']);
        $emitter->on(self::END_EVENT, [$this, 'onPeridotEnd']);
    }

    /**
     * {@inheritdoc}
     */
    public function onPeridotStart(Environment $env, Application $application)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function onPeridotEnd($exitCode, InputInterface $input, OutputInterface $output)
    {
    }

}
