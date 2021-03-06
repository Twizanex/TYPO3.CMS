<?php
namespace TYPO3\CMS\Form\Domain\Model\Element;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Button model object
 *
 * @author Patrick Broens <patrick@patrickbroens.nl>
 */
class ButtonElement extends \TYPO3\CMS\Form\Domain\Model\Element\AbstractElement {

	/**
	 * Allowed attributes for this object
	 *
	 * @var array
	 */
	protected $allowedAttributes = array(
		'accesskey' => '',
		'alt' => '',
		'class' => '',
		'dir' => '',
		'disabled' => '',
		'id' => '',
		'lang' => '',
		'name' => '',
		'style' => '',
		'tabindex' => '',
		'title' => '',
		'type' => 'button',
		'value' => ''
	);

	/**
	 * Mandatory attributes for this object
	 *
	 * @var array
	 */
	protected $mandatoryAttributes = array(
		'name',
		'id'
	);

	/**
	 * Set the value of the button
	 * Checks if value is set from Typoscript,
	 * otherwise use localized value.
	 * Also changes the value attribute
	 *
	 * @param string $value Value to display on button
	 * @return void
	 * @see \TYPO3\CMS\Form\Domain\Model\Element\AbstractElement::setValue()
	 */
	public function setValue($value = '') {
		/** @var $localizationHandler \TYPO3\CMS\Form\Localization */
		$localizationHandler = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Form\Localization::class);
		$oldValue = $this->getAttributeValue('value');
		if (empty($oldValue)) {
			if (!empty($value)) {
				$newValue = (string)$value;
			} else {
				$newValue = $localizationHandler->getLocalLanguageLabel('tx_form_domain_model_element_button.value');
			}
			$this->value = (string)$newValue;
			$this->setAttribute('value', $newValue);
		}
	}

}
