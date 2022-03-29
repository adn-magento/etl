<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

use Adn\Etl\Exception\EtlException;

class PipelinePool implements PipelinePoolInterface
{
    /** @var PipelineInterface[] */
    private array $pipelines = [];

    /**
     * Pipeline pool constructor
     *
     * @param PipelineInterface[] $pipelines Etl pipelines
     *
     * @throws EtlException
     */
    public function __construct(array $pipelines)
    {
        foreach ($pipelines as $name => $pipeline) {

            if (!$pipeline instanceof PipelineInterface) {
                throw new EtlException(
                    'Etl pipeline %s must be implement %s', get_class($pipeline), PipelineInterface::class
                );
            }

            $this->pipelines[$name] = $pipeline;
        }
    }

    /**
     * Get pipeline
     *
     * @param string $name Etl pipeline name
     *
     * @return PipelineInterface|null
     */
    public function getPipeline(string $name): ?PipelineInterface
    {
        return $this->pipelines[$name] ?? null;
    }
}
