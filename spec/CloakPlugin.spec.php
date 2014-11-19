<?php

use cloak\peridot\CloakPlugin;
use cloak\peridot\RegistrarInterface as Registrar;
use Evenement\EventEmitter;


describe('CloakPlugin', function() {
    describe('#create', function() {
        beforeEach(function() {
            $this->plugin = CloakPlugin::create();
        });
        it('returns cloak\peridot\CloakPlugin instance', function() {
            expect($this->plugin)->toBeAnInstanceOf('cloak\peridot\CloakPlugin');
        });
    });
    describe('#register', function() {
        beforeEach(function() {
            $this->emitter = new EventEmitter();
            $this->plugin = CloakPlugin::create();
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
