<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\docdoc;

use carono\docdoc\methods\ClinicCount;
use carono\docdoc\methods\DetectCity;
use carono\docdoc\methods\NearDistricts;
use carono\docdoc\methods\NearestStationGeo;
use carono\docdoc\methods\Review;

class AbstractClient extends \carono\rest\Client
{
	protected $url = 'back.docdoc.ru/api/rest/1.0.6/json';

	protected $protocol = 'https';


	/**
	 * @url /nearestStationGeo/lat/$lat/lng/$lng/city/$city
	 *
	 * @param string $lat Широта
	 * @param int $lng Долгота
	 * @return NearestStationGeo
	 */
	public function nearestStationGeo($lat, $lng)
	{
		$params = [
			'lat' => $lat,
			'lng' => $lng,
			'city' => $city
		];
		return (new NearestStationGeo('nearestStationGeo', $this))->setParams($params);
	}


	/**
	 * @url /nearDistricts/id/$districtID/limit/$limit
	 *
	 * @param int $districtID Уникальный числовой идентификатор района
	 * @param int $limit Максимальное число ближайших районов при выборке
	 * @return NearDistricts
	 */
	public function nearDistricts($districtID, $limit)
	{
		$params = [
			'id' => $districtID,
			'limit' => $limit
		];
		return (new NearDistricts('nearDistricts', $this))->setParams($params);
	}


	/**
	 * @url /detectCity/
	 *
	 * @return DetectCity
	 */
	public function detectCity()
	{
		$params = [];
		return (new DetectCity('detectCity', $this))->setParams($params);
	}


	/**
	 * @url /clinic/count/city/$cityID/type/$clinicType/stations/$stationsID/speciality/$specialityID
	 *
	 * @param int $cityID Идентификатор города
	 * @return ClinicCount
	 */
	public function clinicCount($cityID)
	{
		$params = [
			'city' => $cityID,
			'type' => $clinicType,
			'stations' => $stationsID,
			'speciality' => $specialityID
		];
		return (new ClinicCount('clinic/count', $this))->setParams($params);
	}


	/**
	 * @url /review/clinic/$ID
	 *
	 * @param int $iD ID клиники
	 * @return Review
	 */
	public function review($iD)
	{
		$params = [
			'clinic' => $ID
		];
		return (new Review('review', $this))->setParams($params);
	}
}
