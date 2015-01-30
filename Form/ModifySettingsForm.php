<?php

namespace Brother\ConfigBundle\Form;

use Brother\ConfigBundle\Form\Type\SettingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class ModifySettingsForm extends AbstractType {

	/**
	 * {@inheritDoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('settings', 'collection', array(
			'type' => new SettingType(),
		));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return 'brother_config_modifySettings';
	}

}
