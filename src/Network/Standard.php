<?php

namespace FANN\Network;

use FANN\Exception\InvalidArguments;

/**
 * Class Standard.
 * It implements the standard neural network.
 *
 * @author  Damian Gręda <dj.dmg0@gmail.com>
 *
 * @package FANN\Network
 */
class Standard extends AbstractNetwork
{
    const EXCEPTION_LAYERS_MISMATCH = 'The number of layers and thus expected count of sizes provided do not match';

    /**
     * Standard neural network constructor.
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     *
     * @param int   $numberOfLayers Number of layers inside neural network
     * @param array $layerSizes     An array of layer sizes (amount of neurons on each layer)
     */
    public function __construct($numberOfLayers, array $layerSizes)
    {
        if ($numberOfLayers !== count($layerSizes)) {
            throw new InvalidArguments(static::EXCEPTION_LAYERS_MISMATCH);
        }

        $this->setNumberOfLayers($numberOfLayers);
        $this->setNetwork($this->createFromLayersArray($layerSizes));
    }

    /**
     * Creates and returns instance of neural network resource.
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     *
     * @param array $layerSizes An array of layer sizes (amount of neurons on each layer)
     *
     * @return resource
     */
    protected function createFromLayersArray(array $layerSizes)
    {
        return fann_create_standard_array($this->getNumberOfLayers(), $layerSizes);
    }
}