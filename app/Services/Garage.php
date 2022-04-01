<?php

namespace App\Services;

use App\Models\Garage as GarageModel;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class Garage
{
  private $garageModel;

  public function __construct()
  {
    $this->garageModel = new GarageModel();
  }

  public function getAllGarages(): string
  {
    return $this->formResponse($this->garageModel->getAllGarages());
  }

  public function getByCountry(string $country): string
  {
    return $this->formResponse($this->garageModel->findByCountry($country));
  }

  public function getByOwnerName(string $ownerName): string
  {
    return $this->formResponse($this->garageModel->findByOwnerName($ownerName));
  }

  public function getClosestWithinRadius(int $radiusInKilometers, float $lat, float $lng): string
  {
    return $this->formResponse($this->garageModel->findClosestWithinRadius($radiusInKilometers, $lat, $lng));
  }

  private function normalizeGaragesData($garagesRawData)
  {
    foreach ($garagesRawData as $garageRaw) {
      $garageRaw->garage_id = $garageRaw->id;

      $lat = $garageRaw->lat;
      $lng = $garageRaw->lng;
      $garageRaw->point = "$lat $lng";

      unset($garageRaw->lat);
      unset($garageRaw->lng);
      unset($garageRaw->id);
    }

    return $garagesRawData;
  }

  private function formResponse($rawGaragesData): string
  {
    return json_encode([
      "results" => true,
      "garages" => $this->normalizeGaragesData($rawGaragesData)
    ]);
  }
}
