<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Garage as GarageModel;
use App\Services\Garage as GarageService;

class Garage extends Controller
{
  public function all(GarageService $garageService)
  {
    return $garageService->getAllGarages();
  }
}
