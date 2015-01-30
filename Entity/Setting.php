<?php

namespace Brother\ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Craue\ConfigBundle\Entity\Setting as BaseSetting;

/**
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2014 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 *
 * @ORM\Entity
 */
class Setting extends BaseSetting {

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(name="name", type="string", nullable=false, unique=true)
	 * @Assert\NotBlank
	 */
	protected $name;

	/**
	 * @var string
	 * @ORM\Column(name="value", type="string", nullable=true)
	 */
	protected $value;

	/**
	 * @var string
	 * @ORM\Column(name="section", type="string", nullable=true, length=1024)
	 */
	protected $section;

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function setSection($section) {
		$this->section = $section;
	}

	public function getSection() {
		return $this->section;
	}

}
