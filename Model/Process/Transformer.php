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

class Transformer implements TransformerInterface
{
    /** @var callable */
    private $callable;

    /**
     * Transformer Constructor
     *
     * @param callable $callable Callable loader
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Transform Entry
     *
     * @param array $entries Entries loaded
     * @param mixed $entry Entry extracted
     * @param ContextInterface $context Etl context
     *
     * @return void
     */
    public function transform(array &$entries, $entry, ContextInterface $context): void
    {
        call_user_func_array($this->callable, [&$entries, $entry, $context]);
    }
}
