<?php

namespace spec\Product\Nu3\Service\Product;

use Nu3\Service\Product\Entity\Product;
use Nu3\Service\Product\TransferObject;
use Nu3\Core\RegionCheck;
use Nu3\Service\Product\PropertyMap;
use Nu3\Spec\App;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntityBuilderSpec extends ObjectBehavior
{
  function let()
  {
    $this->setConfig(App::getInstance()->getConfig());
    $this->setPropertyMap(new PropertyMap());
    $this->setRegionCheck(new RegionCheck());
  }

  function it_should_apply_dto_attributes_to_entity(TransferObject $dto, Product $product)
  {
    $dtoMock = $this->mockDto($dto, 'nu3_36', 'config', [
      'global' => [
        'name' => 'some name'
      ]
    ]);

    $_entity = $this->applyDtoAttributesToEntity($dtoMock, $product);

    $this->verifyExpectedAttributes($_entity, 'nu3_36', 'config', [
      'global' => [
        'name' => 'some name'
      ]
    ]);
  }

  function it_should_ignore_unknown_property(TransferObject $dto, Product $product)
  {
    $dtoMock = $this->mockDto($dto, 'nu3_36', 'config', [
      'global' => [
        'name' => 'some name',
        'unknown' => 'value'
      ]
    ]);

    $_product = $this->applyDtoAttributesToEntity($dtoMock, $product);

    $this->verifyExpectedAttributes($_product, 'nu3_36', 'config', [
      'global' => [
        'name' => 'some name'
      ]
    ]);
  }

  function it_should_ignore_region_specific_property(TransferObject $dto, Product $product)
  {
    $dtoMock = $this->mockDto($dto, 'nu3_36', 'config', [
      'de_de' => [
        'name' => 'some name',
        "status" => "new" //it is not allowed to set status for language regions
      ]
    ]);

    $_product = $this->applyDtoAttributesToEntity($dtoMock, $product);

    $this->verifyExpectedAttributes($_product, 'nu3_36', 'config', [
      'de_de' => [
        'name' => 'some name'
      ]
    ]);
  }

  private function mockDto(TransferObject $dto, string $sku, string $type, array $properties)
  {
    $dto->sku = $sku;
    $dto->type = $type;
    $dto->properties = $properties;

    return $dto;
  }

  private function verifyExpectedAttributes(
    Product $entity,
    string $sku,
    string $type,
    array $expectedProperties
  ) {
    $entity->__get('sku')->shouldReturn($sku);
    $entity->__get('type')->shouldReturn($type);
    $entity->__get('properties')->shouldReturn($expectedProperties);
  }
}