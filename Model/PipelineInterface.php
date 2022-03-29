<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

interface PipelineInterface
{
    /**
     * Get Processes
     *
     * @return ProcessInterface[]
     */
    public function getProcesses(): array;
}
