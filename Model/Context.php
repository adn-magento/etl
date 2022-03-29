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
use Magento\Framework\DataObject;

class Context extends DataObject implements ContextInterface
{
    /**
     * Create etl exception
     *
     * @param string $message
     * @return EtlException
     */
    public function createEtlException(string $message): EtlException
    {
        return new EtlException($message);
    }

    /**
     * Get options
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->getData(static::OPTIONS);
    }

    /**
     * Set options
     *
     * @param array $options input options
     *
     * @return $this
     */
    public function setOptions(array $options): ContextInterface
    {
        return $this->setData(static::OPTIONS, $options);
    }

    /**
     * Get arguments
     *
     * @return array
     */
    public function getArguments(): array
    {
        return $this->getData(static::ARGUMENTS);
    }

    /**
     * Set arguments
     *
     * @param array $arguments input arguments
     *
     * @return $this
     */
    public function setArguments(array $arguments): ContextInterface
    {
        return $this->setData(static::ARGUMENTS, $arguments);
    }
}
