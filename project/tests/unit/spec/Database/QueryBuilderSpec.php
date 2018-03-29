<?php

namespace spec\Database\Nu3\Core\Database;

use Nu3\Spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QueryBuilderSpec extends ObjectBehavior
{
  function __construct()
  {
    $app = App::getInstance();
    $app->connectDb();
  }

  function it_concatenates_columns_and_json_values()
  {
    $this->concatColumnsAndJsonValues('global', 'null' , ['de_de' => ['key' => 'value']])
      ->shouldReturn([
        'global,"de_de"',
        'null,\'{"key":"value"}\''
      ]);
  }

  function it_concatenates_columns_and_json_values_with_empty_input()
  {
    $this->concatColumnsAndJsonValues('', '' , ['de_de' => ['key' => 'value']])
      ->shouldReturn([
        '"de_de"',
        '\'{"key":"value"}\''
      ]);
  }

  function it_concatenates_columns_and_empty_json_values()
  {
    $this->concatColumnsAndJsonValues('global', 'null' , [])
      ->shouldReturn([
        'global',
        'null'
      ]);
  }

  function it_escapes_values()
  {
    $this->concatColumnsAndJsonValues('', '' , ['de_de' => ['key' => 'val\'ue']])
      ->shouldReturn([
        '"de_de"',
        '\'{"key":"val\'\'ue"}\''
      ]);
  }

  function it_should_prepare_for_values_expression()
  {
    $this->prepareForValuesExpression([1,2,3])->shouldReturn('(1),(2),(3)');
  }

  function it_should_concatenate_into_empty_values_expression()
  {
    $this->prepareForValuesExpression([])->shouldReturn('');
  }

}