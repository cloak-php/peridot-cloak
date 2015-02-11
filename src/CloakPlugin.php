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
use cloak\configuration\ConfigurationLoader;
use cloak\AnalyzerInterface;
use cloak\Analyzer;


/**
 * Class CloakPlugin
 * @package cloak\peridot
 */
class CloakPlugin implements RegistrarInterface
{

    /**
     * @var \cloak\AnalyzerInterface
     */
    private $analyzer;


    /**
     * @param AnalyzerInterface $analyzer
     */
    public function __construct(AnalyzerInterface $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    /**
     * @param string $configurationFile
     * @return CloakPlugin
     */
    public static function create($configurationFile)
    {
        $loader = new ConfigurationLoader();
        $configuration = $loader->loadConfiguration($configurationFile);

        $analyzer = new Analyzer($configuration);

        return new self($analyzer);
    }

    /**
     * {@inheritdoc}
     */
    public function registerTo(EventEmitterInterface $emitter)
    {
        $emitter->on(self::START_EVENT, [$this, 'onPeridotStart']);
        $emitter->on(self::END_EVENT, [$this, 'onPeridotEnd']);
    }

    /**
     * {@inheritdoc}
     */
    public function onPeridotStart(Environment $env, Application $application)
    {
        $this->analyzer->start();
    }

    /**
     * {@inheritdoc}
     */
    public function onPeridotEnd($exitCode, InputInterface $input, OutputInterface $output)
    {
        $this->analyzer->stop();
    }

}
