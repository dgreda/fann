<?php

namespace FANN\Network;

/**
 * Class AbstractNetwork. Serves as a base to any type of the neural network.
 *
 * @author  Damian Gręda <dj.dmg0@gmail.com>
 *
 * @package FANN\Network
 */
class AbstractNetwork implements NetworkInterface
{
    /**
     * @var resource Neural network resource
     */
    protected $network;

    /**
     * @var int Number of layers inside neural network
     */
    protected $numberOfLayers;

    /**
     * @return int Number of layers inside neural network
     */
    public function getNumberOfLayers()
    {
        return $this->numberOfLayers;
    }

    /**
     * @param int $numberOfLayers Number of layers inside neural network
     *
     * @return AbstractNetwork
     */
    public function setNumberOfLayers($numberOfLayers)
    {
        $this->numberOfLayers = $numberOfLayers;

        return $this;
    }

    /**
     * @return resource Neural network resource
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param resource $network Neural network resource
     *
     * @return AbstractNetwork
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Destructor, called when object is removed to cleanup and release the resources.
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     */
    public function __destruct()
    {
        $this->destroy();
    }

    /**
     * Destroys the neural network and frees allocated resources
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     */
    public function destroy()
    {
        fann_destroy($this->getNetwork());
    }

    /**
     * Returns the number of neurons on the input of the neural network
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     *
     * @return int|false Number of input neurons, or FALSE on error
     */
    public function getNumberOfInputNeurons()
    {
        return (int) fann_get_num_input($this->getNetwork());
    }

    /**
     * Returns the number of neurons on the output of the neural network
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     *
     * @return int|false Number of output neurons, or FALSE on error
     */
    public function getNumberOfOutputNeurons()
    {
        return (int) fann_get_num_output($this->getNetwork());
    }

    /**
     * Gets an array containing numbers of neurons in each layer of the neural network.
     *
     * @author Damian Gręda <dj.dmg0@gmail.com>
     *
     * @return array An array of numbers of neurons in each layer
     */
    public function getNumbersOfNeuronsOnLayers()
    {
        return fann_get_layer_array($this->getNetwork());
    }
}