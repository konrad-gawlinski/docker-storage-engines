<?php

namespace Nu3\Service\Product\Action;

use Nu3\Service\Product\TransferObject;

class Factory extends \Nu3\Service\Product\Factory
{
  function createDataTransferObject(CURequest $request) : TransferObject
  {
    return new TransferObject($request);
  }

  /**
   * @return Validator
   */
  function createValidator()
  {
    $object = new Validator();
    $object->setConfig($this->config());

    return $object;
  }
}
