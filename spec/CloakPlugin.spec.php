<?php

use cloak\peridot\CloakPlugin;

describe('CloakPlugin', function() {
    describe('#create', function() {
        beforeEach(function() {
            $this->plugin = CloakPlugin::create();
        });
        it('returns cloak\peridot\CloakPlugin instance', function() {
            expect($this->plugin)->toBeAnInstanceOf('cloak\peridot\CloakPlugin');
        });
    });
});
