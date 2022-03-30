# Adn Magento ETL

Data transformation module that uses the extract/transform/load (ETL) pattern.

## Requirements

| Service        | Version |
|----------------|---------|
| Magento        | ^2.4    |

## Install

```shell
composer require adn-magento/etl
```

## Concept

Scratch example

```php
<?php

use Adn\Etl\Model\Pipeline;
use Adn\Etl\Model\Process;
use Adn\Etl\Model\Process\Extractor;
use Adn\Etl\Model\Process\Transformer;
use Adn\Etl\Model\Process\Loader;
use Adn\Etl\Model\Context;
use Adn\Etl\Model\Runner;

$batchSize = 100;

$pipeline = new Pipeline([
    new Process(
        'First Process',
        new Extractor(function (Context $context) {
            return [
                ['label' => 'first row'],
                ['label' => 'second row'],
            ];
        }),
        new Transformer(function (&$entries, $entry, Context $context) {
            
            $identifier = $context->getData('identifier');
        
            $entries[] = [
                'id'     => (int)$identifier,
                'source' => (string)'first_process_etl',
                'data'   => (string)$entry['label'],
            ];
            
            $context->setData('identifier', ($identifier + 1));
        }),
        new Loader(function (array $entries, Context $context) {
            var_dump($entries);
        }),
        $batchSize
    ),
    new Process(
        'Second Process',
        new Extractor(function (Context $context) {
            return [
                ['label' => 'first row'],
                ['label' => 'second row'],
            ];
        }),
        new Transformer(function (&$entries, $entry, Context $context) {
            
            $identifier = $context->getData('identifier');
        
            $entries[] = [
                'id'     => (int)$identifier,
                'source' => (string)'first_process_etl',
                'data'   => (string)$entry['label'],
            ];
            
            $context->setData('identifier', ($identifier + 1));
        }),
        new Loader(function (array $entries, Context $context) {
            var_dump($entries);
        }),
        $batchSize
    ),
]);

$context = new context(['identifier' => 1])

$runner = new Runner();

$preProcess = function (Process $process, Context $context) {
    sprintf('Process %s start' . PHP_EOL, $process->getName());
};

$postProcess = function (Process $process, Context $context) {
    sprintf('Process %s end' . PHP_EOL, $process->getName());
}

$runner->runPipeline(
    $pipeline, 
    $context,
    $preProcess,
    $postProcess
);
```
