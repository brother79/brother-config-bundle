<?php

namespace Brother\ConfigBundle\Controller;

use Brother\ConfigBundle\Controller\SettingsController;
use Symfony\Component\HttpFoundation\Response;

class SettingEditAdminController extends SettingsController
{
    public function listAction(){
        return parent::modifyAction();
    }

    /**
     * @param string   $view
     * @param array    $parameters
     * @param Response $response
     *
     * @return Response
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $parameters['admin_pool']    = $this->get('sonata.admin.pool');
        return parent::render($view, $parameters, $response);
    }

}
