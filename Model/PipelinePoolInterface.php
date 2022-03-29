<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

interface PipelinePoolInterface
{
    /**
     * Get pipeline
     *
     * @param string $name Etl pipeline name
     *
     * @return PipelineInterface|null
     */
    public function getPipeline(string $name): ?PipelineInterface;
}
