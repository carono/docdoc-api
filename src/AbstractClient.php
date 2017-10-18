<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\docdoc;

use carono\docdoc\methods\Area;
use carono\docdoc\methods\Autocomplete;
use carono\docdoc\methods\City;
use carono\docdoc\methods\Clinic;
use carono\docdoc\methods\ClinicByAlias;
use carono\docdoc\methods\ClinicCount;
use carono\docdoc\methods\ClinicList;
use carono\docdoc\methods\DetectCity;
use carono\docdoc\methods\Diagnostic;
use carono\docdoc\methods\District;
use carono\docdoc\methods\Doctor;
use carono\docdoc\methods\DoctorByAlias;
use carono\docdoc\methods\DoctorList;
use carono\docdoc\methods\Guidelines;
use carono\docdoc\methods\JsonServiceList;
use carono\docdoc\methods\Metro;
use carono\docdoc\methods\NearDistricts;
use carono\docdoc\methods\NearestStation;
use carono\docdoc\methods\NearestStationGeo;
use carono\docdoc\methods\Page;
use carono\docdoc\methods\Request;
use carono\docdoc\methods\ReviewClinic;
use carono\docdoc\methods\ReviewDoctor;
use carono\docdoc\methods\SlotListSlotList;
use carono\docdoc\methods\Speciality;
use carono\docdoc\methods\Stat;
use carono\docdoc\methods\Street;

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
			'lng' => $lng
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
			'city' => $cityID
		];
		return (new ClinicCount('clinic/count', $this))->setParams($params);
	}


	/**
	 * @url /review/doctor/$ID
	 *
	 * @param int $id ID врача
	 * @return ReviewDoctor
	 */
	public function reviewDoctor($id)
	{
		$params = [
			'doctor' => $id
		];
		return (new ReviewDoctor('review', $this))->setParams($params);
	}


	/**
	 * @url /review/clinic/$ID
	 *
	 * @param int $id ID клиники
	 * @return ReviewClinic
	 */
	public function reviewClinic($id)
	{
		$params = [
			'clinic' => $id
		];
		return (new ReviewClinic('review', $this))->setParams($params);
	}


	/**
	 * @url /doctor/$ID/city/$city
	 *
	 * @param int $id ID врача
	 * @return Doctor
	 */
	public function doctor($id)
	{
		$params = [
			'doctor' => $id
		];
		return (new Doctor('doctor', $this))->setParams($params);
	}


	/**
	 * @url /doctor/by/alias/$alias/city/$city
	 *
	 * @param string $alias Альяс врача
	 * @return DoctorByAlias
	 */
	public function doctorByAlias($alias)
	{
		$params = [
			'alias' => $alias
		];
		return (new DoctorByAlias('doctor/by', $this))->setParams($params);
	}


	/**
	 * @url /clinic/$ID
	 *
	 * @param int $id ID клиники
	 * @return Clinic
	 */
	public function clinic($id)
	{
		$params = [
			'clinic' => $id
		];
		return (new Clinic('clinic', $this))->setParams($params);
	}


	/**
	 * @url /clinic/by/alias/$alias/city/$city
	 *
	 * @param string $alias Альяс диагностического центра
	 * @return ClinicByAlias
	 */
	public function clinicByAlias($alias)
	{
		$params = [
			'alias' => $alias
		];
		return (new ClinicByAlias('clinic/by', $this))->setParams($params);
	}


	/**
	 * @url /guidelines
	 *
	 * @return Guidelines
	 */
	public function guidelines()
	{
		$params = [];
		return (new Guidelines('guidelines', $this))->setParams($params);
	}


	/**
	 * @url /nearestStation/id/$stationID/
	 *
	 * @param int $stationID Уникальный числовой идентификатор станции
	 * @return NearestStation
	 */
	public function nearestStation($stationID)
	{
		$params = [
			'id' => $stationID
		];
		return (new NearestStation('nearestStation', $this))->setParams($params);
	}


	/**
	 * @url /doctor/list/start/$start/count/$count/city/$cityID/
	 *
	 * @param int $cityID Уникальный идентификатор города
	 * @param int $count Максимальное количество врачей (не более 500)
	 * @return DoctorList
	 */
	public function doctorList($cityID, $count)
	{
		$params = [
			'city' => $cityID,
			'count' => $count
		];
		return (new DoctorList('doctor/list', $this))->setParams($params);
	}


	/**
	 * @url /city/
	 *
	 * @return City
	 */
	public function city()
	{
		$params = [];
		return (new City('city', $this))->setParams($params);
	}


	/**
	 * @url /diagnostic/
	 *
	 * @return Diagnostic
	 */
	public function diagnostic()
	{
		$params = [];
		return (new Diagnostic('diagnostic', $this))->setParams($params);
	}


	/**
	 * @url /clinic/list/start/$startFrom/count/$countList/city/$cityID/type/$clinicType/district/$districtId/stations/$stationsID/near/$nearMode/speciality/$specialityID/street/$streetId/order/$order/workAllTime/$workAllTime
	 *
	 * @param int $startFrom Начиная с какого порядкого номера вернуть список врачей
	 * @param int $countList Сколько врачей должно быть в списке
	 * @param int $cityID Идентификатор города
	 * @return ClinicList
	 */
	public function clinicList($startFrom, $countList, $cityID)
	{
		$params = [
			'start' => $startFrom,
			'count' => $countList,
			'city' => $cityID
		];
		return (new ClinicList('clinic/list', $this))->setParams($params);
	}


	/**
	 * @url /area/
	 *
	 * @return Area
	 */
	public function area()
	{
		$params = [];
		return (new Area('area', $this))->setParams($params);
	}


	/**
	 * @url /district/city/$cityID/area/$areaID
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @param int $areaID Уникальный числовой идентификатор округа
	 * @return District
	 */
	public function district($cityID, $areaID)
	{
		$params = [
			'city' => $cityID,
			'area' => $areaID
		];
		return (new District('district', $this))->setParams($params);
	}


	/**
	 * @url /slot/list/doctor/$ID_DOCTOR/clinic/$ID_CLINIC/from/$START_DATE/to/$FINISH_DATE//slot/list/diagnostic/$ID_DIAGNOSTIC/clinic/$ID_CLINIC/from/$START_DATE/to/$FINISH_DATE/
	 *
	 * @return SlotListSlotList
	 */
	public function slotListSlotList()
	{
		$params = [];
		return (new SlotListSlotList('slot/list/slot/list', $this))->setParams($params);
	}


	/**
	 * @url /speciality/city/$cityID/
	 *
	 * @return Speciality
	 */
	public function speciality()
	{
		$params = [];
		return (new Speciality('speciality', $this))->setParams($params);
	}


	/**
	 * @url /metro/city/$cityID/
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @return Metro
	 */
	public function metro($cityID)
	{
		$params = [
			'city' => $cityID
		];
		return (new Metro('metro', $this))->setParams($params);
	}


	/**
	 * @url /street/city/$cityID/
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @return Street
	 */
	public function street($cityID)
	{
		$params = [
			'city' => $cityID
		];
		return (new Street('street', $this))->setParams($params);
	}


	/**
	 * @url /json/service/list
	 *
	 * @return JsonServiceList
	 */
	public function jsonServiceList()
	{
		$params = [];
		return (new JsonServiceList('json/service/list', $this))->setParams($params);
	}


	/**
	 * @url /autocomplete
	 *
	 * @param int $city идентификатор города
	 * @param string $search текст который пытаемся найти
	 * @return Autocomplete
	 */
	public function autocomplete($city, $search)
	{
		$params = [];
		return (new Autocomplete('autocomplete', $this))->setParams($params);
	}


	/**
	 * @url /stat/city/$cityID/
	 *
	 * @return Stat
	 */
	public function stat()
	{
		$params = [];
		return (new Stat('stat', $this))->setParams($params);
	}


	/**
	 * @url /page
	 *
	 * @param string $alias название страницы
	 * @return Page
	 */
	public function page($alias)
	{
		$params = [];
		return (new Page('page', $this))->setParams($params);
	}


	/**
	 * @url /request
	 *
	 * @param int $clinicID Идентификатор клиники
	 * @return Request
	 */
	public function request($clinicID)
	{
		$params = [];
		return (new Request('request', $this))->setParams($params);
	}
}
