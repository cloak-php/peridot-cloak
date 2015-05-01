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

use cloak\Analyzer;
use cloak\AnalyzerInterface;
use cloak\configuration\ConfigurationLoader;
use Evenement\EventEmitterInterface;

/**
 * Class CloakPlugin
 */
class CloakPlugin implements Registrar
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
     *
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
        $emitter->on(self::START_EVENT, [ $this, 'onRunnerStart' ]);
        $emitter->on(self::END_EVENT, [ $this, 'onRunnerEnd' ]);
    }

    /**
     * {@inheritdoc}
     */
    public function onRunnerStart()
    {
        $this->analyzer->start();
    }

    /**
     * {@inheritdoc}
     */
    public function onRunnerEnd($processingTime)
    {
        $this->analyzer->stop();
    }
}
