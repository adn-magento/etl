<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

use Exception;
use Magento\Framework\App\ObjectManager;
use Psr\Log\LoggerInterface;

class Runner implements RunnerInterface
{
    /** @var LoggerInterface */
    private LoggerInterface $logger;

    /**
     * Etl runner constructor
     *
     * @param LoggerInterface|null $logger Logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?? ObjectManager::getInstance()->get(LoggerInterface::class);
    }

    /**
     * Run pipeline with context
     *
     * @param PipelineInterface $pipeline Etl pipeline
     * @param ContextInterface $context Etl context
     * @param callable|null $preProcess Pre-process callable
     * @param callable|null $postProcess Post-process callable
     *
     * @return void
     */
    public function runPipeline(PipelineInterface $pipeline, ContextInterface $context, callable $preProcess = null, callable $postProcess = null): void
    {
        foreach ($pipeline->getProcesses() as $process) {

            if (is_callable($preProcess)) {
                call_user_func_array($preProcess, [$process, $context]);
            }

            $this->runProcess($process, $context);

            if (is_callable($postProcess)) {
                call_user_func_array($postProcess, [$process, $context]);
            }
        }
    }

    /**
     * Run process
     *
     * @param ProcessInterface $process Etl process
     * @param ContextInterface $context Etl context
     *
     * @return void
     */
    public function runProcess(ProcessInterface $process, ContextInterface $context): void
    {
        try {

            $entries = [];

            foreach ($process->getExtractor()->extract($context) as $entry) {

                $process->getTransformer()->transform($entries, $entry, $context);

                if (count($entries) >= $process->getBathSize()) {
                    $process->getLoader()->load($entries, $context);
                    $entries = [];
                }
            }

            if (!empty($entries)) {
                $process->getLoader()->load($entries, $context);
            }

        } catch (Exception $e) {
            $this->logger->error('Etl runner process error', [
                'process'   => $process->getName(),
                'exception' => $e,
            ]);
        }
    }
}
