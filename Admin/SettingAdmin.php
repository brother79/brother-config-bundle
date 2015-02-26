<?php

namespace Brother\ConfigBundle\Admin;

use Brother\CommonBundle\AppDebug;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SettingAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('value')
            ->add('section');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('value')
            ->add('section')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('value', 'textarea')
            ->add('section');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('value')
            ->add('section');
    }

    /**
     * {@inheritdoc}
     */
    public function delete($object)
    {
        $this->preRemove($object);
        foreach ($this->extensions as $extension) {
            $extension->preRemove($this, $object);
        }

//        $this->getSecurityHandler()->deleteObjectSecurity($this, $object);
        $this->getModelManager()->delete($object);

        $this->postRemove($object);
        foreach ($this->extensions as $extension) {
            $extension->postRemove($this, $object);
        }
    }

    public function createObjectSecurity($object)
    {
    }

}
