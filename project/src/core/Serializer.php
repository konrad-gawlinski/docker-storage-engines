<?php

namespace Nu3\Core;

use JMS\Serializer\Serializer as ExternalSerializer;

class Serializer
{
  /** @var  ExternalSerializer */
  private $serializer;

  function __construct(ExternalSerializer $serializer)
  {
    $this->serializer = $serializer;
  }

  function deserialize(string $json, string $className) : Entity
  {
    return $this->serializer->deserialize($json, $className, 'json');
  }
}