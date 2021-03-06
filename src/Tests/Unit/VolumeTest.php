<?php

/**
 * @file
 * Contains \Drupal\physical\Tests\Unit\WeightTest.
 */

namespace Drupal\physical\Tests\Unit;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\physical\Physical\Volume;
use Drupal\physical\UnitPluginInterface;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\physical\Unit
 * @group physical
 */
class VolumeTest extends UnitTestCase {
  /**
   * Cubic meter unit.
   *
   * @var UnitPluginInterface
   */
  protected $unitCubicMeter;
  /**
   * Cup unit.
   *
   * @var UnitPluginInterface
   */
  protected $unitCup;

  protected $volume;

  /**
   * {@inheritdoc}
   *
   * @covers ::__construct
   */
  protected function setUp() {
    parent::setUp();

    $definitions = [];
    $unit_plugin_manager = $this->getMock('\Drupal\physical\UnitManagerInterface');
    $unit_plugin_manager->expects($this->any())
      ->method('getDefinitions')
      ->willReturn($definitions);

    $container = new ContainerBuilder();
    $container->set('plugin.manager.unit', $unit_plugin_manager);
    \Drupal::setContainer($container);

    $this->volume = new Volume();
    $this->unitCubicMeter = $this->volume->getUnit('m³');
    $this->unitCup = $this->volume->getUnit('cup');
  }

  /**
   * Test that cup converts to cubic meter.
   *
   * @covers ::toBase
   */
  public function testCupToCubicMeter() {
    $this->assertEquals(0.00024, $this->unitCup->toBase(1));
    $this->assertEquals(0.00118, $this->unitCup->toBase(5));
  }

  /**
   * Test that cubic meter converts to cup.
   *
   * @covers ::fromBase
   */
  public function testCubicMeterToCup() {
    $this->assertEquals(4226.75349, $this->unitCup->fromBase(1));
  }

}
