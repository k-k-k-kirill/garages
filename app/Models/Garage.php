<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Garage extends Model
{
    use HasFactory;

    protected $table = 'garages';

    public function getAllGarages()
    {
        return DB::table('garages')
            ->join('owners', 'garages.owner_id', '=', 'owners.id')
            ->select('garages.*', 'owners.name as garage_owner', 'owners.email as contact_email', 'owners.id as owner_id')
            ->get();
    }

    public function findByCountry(string $country)
    {
        return DB::table('garages')
            ->join('owners', 'garages.owner_id', '=', 'owners.id')
            ->select('garages.*', 'owners.name as garage_owner', 'owners.email as contact_email', 'owners.id as owner_id')
            ->where('garages.country', '=', $country)
            ->get();
    }

    public function findByOwnerName(string $ownerName)
    {
        return DB::table('garages')
            ->join('owners', 'garages.owner_id', '=', 'owners.id')
            ->select('garages.*', 'owners.name as garage_owner', 'owners.email as contact_email', 'owners.id as owner_id')
            ->where('owners.name', '=', $ownerName)
            ->get();
    }

    public function findClosestWithinRadius(int $radiusInKilometers, float $lat, float $lng)
    {
        return DB::select(
            DB::raw(
                "SELECT * FROM (
                SELECT *, 
                    (
                        (
                            (
                                acos(
                                    sin(( $lat * pi() / 180))
                                    *
                                    sin(( `lat` * pi() / 180)) + cos(( $lat * pi() /180 ))
                                    *
                                    cos(( `lat` * pi() / 180)) * cos((( $lng - `lng`) * pi()/180)))
                            ) * 180/pi()
                        ) * 60 * 1.1515 * 1.609344
                    )
                as distance FROM `garages`
            ) garages
            WHERE distance <= $radiusInKilometers;"
            )
        );
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner', 'owner_id');
    }
}
