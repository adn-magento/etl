<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

use Adn\Etl\Model\Process\ExtractorInterface;
use Adn\Etl\Model\Process\TransformerInterface;
use Adn\Etl\Model\Process\LoaderInterface;

interface ProcessInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get extractor
     *
     * @return ExtractorInterface
     */
    public function getExtractor(): ExtractorInterface;

    /**
     * Get transformer
     *
     * @return TransformerInterface
     */
    public function getTransformer(): TransformerInterface;

    /**
     * Get loader
     *
     * @return LoaderInterface
     */
    public function getLoader(): LoaderInterface;

    /**
     * Get batch size
     *
     * @return int
     */
    public function getBathSize(): int;
}
