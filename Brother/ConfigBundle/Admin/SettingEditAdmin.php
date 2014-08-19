<?php

namespace Brother\ConfigBundle\Admin;

use Brother\CommonBundle\AppDebug;
use Knp\Menu\FactoryInterface as MenuFactoryInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminExtensionInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Admin\Pool;
use Sonata\AdminBundle\Builder\DatagridBuilderInterface;
use Sonata\AdminBundle\Builder\FormContractorInterface;
use Sonata\AdminBundle\Builder\ListBuilderInterface;
use Sonata\AdminBundle\Builder\RouteBuilderInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteGeneratorInterface;
use Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Translator\LabelTranslatorStrategyInterface;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Acl\Model\DomainObjectInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Validator\ValidatorInterface;

class SettingEditAdmin extends Admin
{

    public function hasRoute($name)
    {
        if ($name == 'list') {
            return parent::hasRoute($name);
        }
        return false;
    }

    public function getBaseRoutePattern()
    {
        return 'settings-edit-admin';
    }

    public function getBaseRouteName()
    {
        return 'brother_config_edit';
    }


}
