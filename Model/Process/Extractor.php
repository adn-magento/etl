<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model\Process;

use Adn\Etl\Model\ContextInterface;

class Extractor implements ExtractorInterface
{
    /** @var callable */
    private $callable;

    /**
     * Extractor constructor
     *
     * @param callable $callable Callable extractor
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Extract entries
     *
     * @param ContextInterface $context Etl context
     *
     * @return iterable
     */
    public function extract(ContextInterface $context): iterable
    {
        return call_user_func_array($this->callable, [$context]);
    }
}
