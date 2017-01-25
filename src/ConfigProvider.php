<?php
/**
 * @copyright: DotKernel
 * @library: dot-validator
 * @author: n3vrax
 * Date: 1/24/2017
 * Time: 11:31 PM
 */

namespace Dot\Validator;

use Dot\Validator\Ems\NoRecordExists;
use Dot\Validator\Ems\RecordExists;
use Dot\Validator\Factory\EmsValidatorFactory;
use Dot\Validator\Factory\ValidatorPluginManagerFactory;
use Zend\Validator\ValidatorPluginManager;

/**
 * Class ConfigProvider
 * @package Dot\Validator
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependenciesConfig(),

            'dot_validator' => [
                'validator_manager' => [
                    'factories' => [
                        NoRecordExists::class => EmsValidatorFactory::class,
                        RecordExists::class => EmsValidatorFactory::class,
                    ],
                    'aliases' => [
                        'emsnorecordexists' => NoRecordExists::class,
                        'emsNoRecordExists' => NoRecordExists::class,
                        'EmsNoRecordExists' => NoRecordExists::class,

                        'emsrecordexists' => RecordExists::class,
                        'emsRecordExists' => RecordExists::class,
                        'EmsRecordExists' => RecordExists::class,
                    ],
                ]
            ],
        ];
    }

    public function getDependenciesConfig()
    {
        return [
            'factories' => [
                'ValidatorManager' => ValidatorPluginManagerFactory::class,
            ],
            'aliases' => [
                ValidatorPluginManager::class => 'ValidatorManager',
            ]
        ];
    }
}
