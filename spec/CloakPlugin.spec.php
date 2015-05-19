<?php

use cloak\peridot\CloakPlugin;
use cloak\peridot\Registrar;
use cloak\ReportableAnalyzer;
use Evenement\EventEmitter;
use Prophecy\Prophet;


describe(CloakPlugin::class, function () {
    beforeEach(function () {
        $this->configFile = __DIR__ . '/fixture/cloak.toml';
        $this->plugin = CloakPlugin::create($this->configFile);
    });
    describe('#create', function () {
        it('returns cloak\peridot\CloakPlugin instance', function () {
            expect($this->plugin)->toBeAnInstanceOf(CloakPlugin::class);
        });
    });
    describe('#registerTo', function () {
        beforeEach(function () {
            $this->emitter = new EventEmitter();
            $this->plugin->registerTo($this->emitter);
            $this->startListeners = $this->emitter->listeners(Registrar::START_EVENT);
            $this->endListeners = $this->emitter->listeners(Registrar::END_EVENT);
        });
        it('register start event', function () {
            expect(count($this->startListeners))->toEqual(1);
        });
        it('register end event', function () {
            expect(count($this->endListeners))->toEqual(1);
        });
    });
    describe('#onRunnerStart', function () {
        beforeEach(function () {
            $this->prophet = new Prophet();
            $analyzer = $this->prophet->prophesize(ReportableAnalyzer::class);

            $this->plugin = new CloakPlugin($analyzer->reveal());
            $analyzer->start()->shouldBeCalled();
            $analyzer->stop()->shouldNotBeCalled();
            $analyzer->isStarted()->shouldNotBeCalled();
            $analyzer->getResult()->shouldNotBeCalled();
        });
        it('analyze start', function () {
            $this->plugin->onRunnerStart();
            $this->prophet->checkPredictions();
        });
    });
    describe('#onRunnerEnd', function () {
        beforeEach(function () {
            $this->prophet = new Prophet();
            $analyzer = $this->prophet->prophesize(ReportableAnalyzer::class);

            $this->plugin = new CloakPlugin($analyzer->reveal());

            $analyzer->start()->shouldNotBeCalled();
            $analyzer->stop()->shouldBeCalled();
            $analyzer->isStarted()->shouldNotBeCalled();
            $analyzer->getResult()->shouldNotBeCalled();
        });
        it('analyze stop', function () {
            $this->plugin->onRunnerEnd(0.9);
            $this->prophet->checkPredictions();
        });
    });
});
