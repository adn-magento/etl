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

class Loader implements LoaderInterface
{
    /** @var callable */
    private $callable;

    /**
     * Loader Constructor
     *
     * @param callable $callable Callable loader
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Load Entries
     *
     * @param array $entries Entries must be loaded
     * @param ContextInterface $context Etl context
     *
     * @return void
     */
    public function load(array $entries, ContextInterface $context): void
    {
        call_user_func_array($this->callable, [$entries, $context]);
    }
}
