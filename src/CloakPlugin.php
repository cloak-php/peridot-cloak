<?php

namespace cloak\peridot;

/**
 * Class CloakPlugin
 * @package cloak\peridot
 */
class CloakPlugin
{

    /**
     * @return CloakPlugin
     */
    public static function create()
    {
        return new self();
    }

}
