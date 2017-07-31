<?php

namespace Nu3\Core\Database;

class Connection
{
  private $connection = null;

  function connect(string $localhost, string $dbname, string $user, string $password)
  {
    $this->connection = pg_connect("host={$localhost} dbname={$dbname} user={$user} password={$password}")
    or die('Could not connect: ' . pg_last_error());

    return $this->connection;
  }

  function disconnect()
  {
    if ($this->connection) pg_close($this->connection);
  }

  function con()
  {
    return $this->connection;
  }
}