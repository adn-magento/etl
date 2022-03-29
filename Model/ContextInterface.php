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

interface ContextInterface
{
    /** @var string */
    public const OPTIONS = 'options';
    /** @var string */
    public const ARGUMENTS = 'arguments';

    /**
     * Create etl exception
     *
     * @param string $message
     * @return EtlException
     */
    public function createEtlException(string $message): EtlException;

    /**
     * Get options
     *
     * @return array
     */
    public function getOptions(): array;

    /**
     * Set options
     *
     * @param array $options input options
     *
     * @return $this
     */
    public function setOptions(array $options): self;

    /**
     * Get arguments
     *
     * @return array
     */
    public function getArguments(): array;

    /**
     * Set arguments
     *
     * @param array $arguments input arguments
     *
     * @return $this
     */
    public function setArguments(array $arguments): self;
}
