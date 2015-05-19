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
use Peridot\Console\Application;
use Peridot\Console\Environment;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Interface Registrar
 */
interface Registrar
{
    const START_EVENT = 'runner.start';
    const END_EVENT = 'runner.end';

    /**
     * @param EventEmitterInterface $emitter
     */
    public function registerTo(EventEmitterInterface $emitter);

    /**
     */
    public function onRunnerStart();

    /**
     * @param float $processingTime
     */
    public function onRunnerEnd($processingTime);
}
