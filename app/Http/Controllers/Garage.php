<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Garage as GarageService;

class Garage extends Controller
{
  public function all()
  {
    $garageService = new GarageService();
    return $garageService->getAllGarages();
  }
}
