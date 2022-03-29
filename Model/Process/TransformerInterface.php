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

interface TransformerInterface
{
    /**
     * Transform Entry
     *
     * @param array $entries Entries loaded
     * @param mixed $entry Entry extracted
     * @param ContextInterface $context Etl context
     *
     * @return void
     */
    public function transform(array &$entries, $entry, ContextInterface $context): void;
}
