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
 * Interface RegistrarInterface
 * @package cloak\peridot
 */
interface RegistrarInterface
{

    const START_EVENT = 'peridot.start';
    const END_EVENT = 'peridot.end';


    /**
     * @param EventEmitterInterface $emitter
     */
    public function register(EventEmitterInterface $emitter);

    /**
     * @param Environment $env
     * @param Application $application
     */
    public function onPeridotStart(Environment $env, Application $application);

    /**
     * @param int $exitCode
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function onPeridotEnd($exitCode, InputInterface $input, OutputInterface $output);

}
