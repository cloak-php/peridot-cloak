<?php

use cloak\peridot\CloakPlugin;
use cloak\peridot\RegistrarInterface as Registrar;
use Evenement\EventEmitter;
use Peridot\Console\Environment;
use Peridot\Console\InputDefinition;
use Peridot\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\NullOutput;
use Prophecy\Prophet;


describe('CloakPlugin', function() {
    beforeEach(function() {
        $this->configFile = __DIR__ . '/fixture/cloak.toml';
        $this->plugin = CloakPlugin::create($this->configFile);
    });
    describe('#create', function() {
        it('returns cloak\peridot\CloakPlugin instance', function() {
            expect($this->plugin)->toBeAnInstanceOf('cloak\peridot\CloakPlugin');
        });
    });
    describe('#registerTo', function() {
        beforeEach(function() {
            $this->emitter = new EventEmitter();
            $this->plugin->registerTo($this->emitter);
            $this->startListeners = $this->emitter->listeners(Registrar::START_EVENT);
            $this->endListeners = $this->emitter->listeners(Registrar::END_EVENT);
        });
        it('register start event', function() {
            expect(count($this->startListeners))->toEqual(1);
        });
        it('register end event', function() {
            expect(count($this->endListeners))->toEqual(1);
        });
    });
    describe('#onPeridotStart', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();
            $analyzer = $this->prophet->prophesize('cloak\AnalyzerInterface');

            $this->plugin = new CloakPlugin($analyzer->reveal());
            $analyzer->start()->shouldBeCalled();
            $analyzer->stop()->shouldNotBeCalled();
            $analyzer->isStarted()->shouldNotBeCalled();
            $analyzer->getResult()->shouldNotBeCalled();

            $emitter = new EventEmitter();
            $this->environment = new Environment(new InputDefinition, $emitter, []);
            $this->application = new Application($this->environment);
        });
        it('analyze start', function() {
            $this->plugin->onPeridotStart($this->environment, $this->application);
            $this->prophet->checkPredictions();
        });
    });
    describe('#onPeridotEnd', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();
            $analyzer = $this->prophet->prophesize('cloak\AnalyzerInterface');

            $this->plugin = new CloakPlugin($analyzer->reveal());

            $analyzer->start()->shouldNotBeCalled();
            $analyzer->stop()->shouldBeCalled();
            $analyzer->isStarted()->shouldNotBeCalled();
            $analyzer->getResult()->shouldNotBeCalled();
        });
        it('analyze stop', function() {
            $this->plugin->onPeridotEnd(0, new ArgvInput([]), new NullOutput());
            $this->prophet->checkPredictions();
        });
    });
});
