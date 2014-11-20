<?php

use cloak\peridot\CloakPlugin;
use cloak\peridot\RegistrarInterface as Registrar;
use Evenement\EventEmitter;


describe('CloakPlugin', function() {
    beforeEach(function() {
        $this->configFile = __DIR__ . '/../fixture/cloak.toml';
        $this->plugin = CloakPlugin::create($this->configFile);
    });
    describe('#create', function() {
        it('returns cloak\peridot\CloakPlugin instance', function() {
            expect($this->plugin)->toBeAnInstanceOf('cloak\peridot\CloakPlugin');
        });
    });
    describe('#register', function() {
        beforeEach(function() {
            $this->emitter = new EventEmitter();
            $this->plugin->register($this->emitter);
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
});
