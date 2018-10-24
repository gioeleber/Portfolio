<?php
namespace App\Controllers;

use \interop\Container\ContainerInterface;

class Controller
{
  protected $c;

  public function __construct(ContainerInterface $c)
  {
    //import the container in the proprety $c
    $this->c = $c;
  }
}
