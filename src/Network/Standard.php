<?php

namespace FANN\Network;

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