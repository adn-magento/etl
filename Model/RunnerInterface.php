<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

interface RunnerInterface
{
    /**
     * Run etl pipeline
     *
     * @param PipelineInterface $pipeline Etl pipeline
     * @param ContextInterface $context Etl context
     * @param callable|null $preProcess Pre-process callable
     * @param callable|null $postProcess Post-process callable
     *
     * @return void
     */
    public function runPipeline(PipelineInterface $pipeline, ContextInterface $context, callable $preProcess = null, callable $postProcess = null): void;

    /**
     * Run process
     *
     * @param ProcessInterface $process Etl process
     * @param ContextInterface $context Etl context
     *
     * @return void
     */
    public function runProcess(ProcessInterface $process, ContextInterface $context): void;
}
