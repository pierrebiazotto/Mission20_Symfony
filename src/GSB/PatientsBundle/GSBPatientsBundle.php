<?php

namespace GSB\PatientsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GSBPatientsBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
