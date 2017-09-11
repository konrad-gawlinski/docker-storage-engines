<?php

namespace Nu3\Service\Product\Action\CreateProduct;

class Factory extends \Nu3\Service\Product\Action\Factory
{
  function createEntityBuilder() : Builder
  {
    return new Builder();
  }

  function createValidator() : Validator
  {
    $object = new Validator();
    $object->setConfig($this->config());

    return $object;
  }
}
