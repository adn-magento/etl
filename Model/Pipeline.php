<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

class Pipeline implements PipelineInterface
{
    /** @var ProcessInterface[] */
    private array $processes = [];

    /**
     * Pipeline constructor
     *
     * @param ProcessInterface[] $processes Etl processes
     */
    public function __construct(array $processes)
    {
        $this->processes = $processes;
    }

    /**
     * Get Processes
     *
     * @return ProcessInterface[]
     */
    public function getProcesses(): array
    {
        return $this->processes;
    }
}
