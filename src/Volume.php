<?php

/**
 * @file
 * Contains \Drupal\physical\Volume.
 */

namespace Drupal\physical;

use Drupal\physical\Unit\UnitFactory;

/**
 * Class Volume.
 *
 * @package Drupal\physical
 */
class Volume extends Physical {
  /**
   * {@inheritdoc}
   */
  public function __construct() {
    $this->addComponent('length');
    $this->addComponent('width');
    $this->addComponent('height');

    $this->addUnit(UnitFactory::inches());
    $this->addUnit(UnitFactory::feet());
    $this->addUnit(UnitFactory::millimeters());
    $this->addUnit(UnitFactory::centimeters());
    $this->addUnit(UnitFactory::millimeters());

    $this->setDefault(UnitFactory::millimeters()->getUnit());

  }

  /**
   * Sets the length.
   *
   * @param int|float $value
   *   The value to set the length to.
   * @param string $unit_type
   *   The unit type of the value.
   */
  public function setLength($value, $unit_type) {
    $this->setComponentValue('length', $value, $unit_type);
  }

  /**
   * Returns length as specified unit.
   *
   * @param string $unit_type
   *    The unit type of the return value.
   *
   * @return float
   *    Returns the unit's value.
   */
  public function getLength($unit_type) {
    return $this->getComponentValue('length', $unit_type);
  }

  /**
   * Sets width.
   *
   * @param int|float $value
   *   The value to set the length to.
   * @param string $unit_type
   *   The unit type of the value.
   */
  public function setWidth($value, $unit_type) {
    $this->setComponentValue('width', $value, $unit_type);
  }

  /**
   * Returns width as specified unit.
   *
   * @param string $unit_type
   *   The value to set the length to.
   *
   * @return float
   *    Returns the unit's value.
   */
  public function getWidth($unit_type) {
    return $this->getComponentValue('width', $unit_type);
  }

  /**
   * Sets height.
   *
   * @param int|float $value
   *   The value to set the length to.
   * @param string $unit_type
   *   The unit type of the value.
   */
  public function setHeight($value, $unit_type) {
    $this->setComponentValue('height', $value, $unit_type);
  }

  /**
   * Returns height as specified unit.
   *
   * @param string $unit_type
   *   The value to set the length to.
   *
   * @return float
   *    Returns the unit's value.
   */
  public function getHeight($unit_type) {
    return $this->getComponentValue('height', $unit_type);
  }

  /**
   * Returns computed volume.
   *
   * @param string $unit_type
   *   The value to set the length to.
   *
   * @return float
   *    Returns the unit's value.
   */
  public function getVolume($unit_type) {
    return $this->getLength($unit_type) * $this->getWidth($unit_type) * $this->getHeight($unit_type);
  }

}
