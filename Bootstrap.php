<?php

namespace lajax\translatemanager;

use Yii;
use yii\base\BootstrapInterface;


class Bootstrap implements BootstrapInterface
{
    /** @var array Model's map */
    private $_modelMap = [
        'Language'             => 'lajax\translatemanager\models\Language',
        'LanguageSource'          => 'lajax\translatemanager\models\LanguageSource',
        'LanguageTranslate'          => 'lajax\translatemanager\models\LanguageTranslate',
        'ExportForm'            => 'lajax\translatemanager\models\ExportForm',
        'ImportForm' => 'lajax\translatemanager\models\ImportForm',
        
    ];
    /** @inheritdoc */
    public function bootstrap($app)
    {
        /** @var Module $module */
        /** @var \yii\db\ActiveRecord $modelName */
        if ($app->hasModule('translatemanager') && ($module = $app->getModule('translatemanager')) instanceof Module) {
            $this->_modelMap = array_merge($this->_modelMap, $module->modelMap);
            foreach ($this->_modelMap as $name => $definition) {
                $class = "lajax\\translatemanager\\models\\" . $name;
                Yii::$container->set($class, $definition);
                $modelName = is_array($definition) ? $definition['class'] : $definition;
                $module->modelMap[$name] = $modelName;
            }
        }
    }
}
