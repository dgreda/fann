<?php

namespace FANN\Network;

/**
 * Interface NetworkInterface. Outlines the methods that each neural network should implement.
 *
 * @package FANN\Network
 */
interface NetworkInterface
{
    public function getNumberOfInputNeurons();

    public function getNumberOfOutputNeurons();

    public function getNumbersOfNeuronsOnLayers();

    public function destroy();
}