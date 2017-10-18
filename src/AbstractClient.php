<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\docdoc;

class AbstractClient extends \carono\rest\Client
{
	protected $url = 'back.docdoc.ru/api/rest/1.0.6/json';

	protected $protocol = 'https';


	/**
	 * @url /nearestStationGeo/lat/$lat/lng/$lng/city/$city
	 *
	 * @param string $lat Широта
	 * @param int $lng Долгота
	 * @return Response
	 */
	public function nearestStationGeo($lat, $lng)
	{
		$params = [
			'lat' => $lat,
			'lng' => $lng
		];
		return (new Response('nearestStationGeo', $this))->setParams($params);
	}


	/**
	 * @url /nearDistricts/id/$districtID/limit/$limit
	 *
	 * @param int $districtID Уникальный числовой идентификатор района
	 * @param int $limit Максимальное число ближайших районов при выборке
	 * @return Response
	 */
	public function nearDistricts($districtID, $limit)
	{
		$params = [
			'id' => $districtID,
			'limit' => $limit
		];
		return (new Response('nearDistricts', $this))->setParams($params);
	}


	/**
	 * @url /detectCity/
	 *
	 * @return Response
	 */
	public function detectCity()
	{
		$params = [];
		return (new Response('detectCity', $this))->setParams($params);
	}


	/**
	 * @url /clinic/count/city/$cityID/type/$clinicType/stations/$stationsID/speciality/$specialityID
	 *
	 * @param int $cityID Идентификатор города
	 * @return Response
	 */
	public function clinicCount($cityID)
	{
		$params = [
			'city' => $cityID
		];
		return (new Response('clinic/count', $this))->setParams($params);
	}


	/**
	 * @url /review/doctor/$ID
	 *
	 * @param int $id ID врача
	 * @return Response
	 */
	public function reviewDoctor($id)
	{
		$params = [
			'doctor' => $id
		];
		return (new Response('review', $this))->setParams($params);
	}


	/**
	 * @url /review/clinic/$ID
	 *
	 * @param int $id ID клиники
	 * @return Response
	 */
	public function reviewClinic($id)
	{
		$params = [
			'clinic' => $id
		];
		return (new Response('review', $this))->setParams($params);
	}


	/**
	 * @url /doctor/$ID/city/$city
	 *
	 * @param int $id ID врача
	 * @return Response
	 */
	public function doctor($id)
	{
		$params = [
			'doctor' => $id
		];
		return (new Response('doctor', $this))->setParams($params);
	}


	/**
	 * @url /doctor/by/alias/$alias/city/$city
	 *
	 * @param string $alias Альяс врача
	 * @return Response
	 */
	public function doctorByAlias($alias)
	{
		$params = [
			'alias' => $alias
		];
		return (new Response('doctor/by', $this))->setParams($params);
	}


	/**
	 * @url /clinic/$ID
	 *
	 * @param int $id ID клиники
	 * @return Response
	 */
	public function clinic($id)
	{
		$params = [
			'clinic' => $id
		];
		return (new Response('clinic', $this))->setParams($params);
	}


	/**
	 * @url /clinic/by/alias/$alias/city/$city
	 *
	 * @param string $alias Альяс диагностического центра
	 * @return Response
	 */
	public function clinicByAlias($alias)
	{
		$params = [
			'alias' => $alias
		];
		return (new Response('clinic/by', $this))->setParams($params);
	}


	/**
	 * @url /guidelines
	 *
	 * @return Response
	 */
	public function guidelines()
	{
		$params = [];
		return (new Response('guidelines', $this))->setParams($params);
	}


	/**
	 * @url /nearestStation/id/$stationID/
	 *
	 * @param int $stationID Уникальный числовой идентификатор станции
	 * @return Response
	 */
	public function nearestStation($stationID)
	{
		$params = [
			'id' => $stationID
		];
		return (new Response('nearestStation', $this))->setParams($params);
	}


	/**
	 * @url /doctor/list/start/$start/count/$count/city/$cityID/
	 *
	 * @param int $cityID Уникальный идентификатор города
	 * @param int $count Максимальное количество врачей (не более 500)
	 * @return Response
	 */
	public function doctorList($cityID, $count)
	{
		$params = [
			'city' => $cityID,
			'count' => $count
		];
		return (new Response('doctor/list', $this))->setParams($params);
	}


	/**
	 * @url /city/
	 *
	 * @return Response
	 */
	public function city()
	{
		$params = [];
		return (new Response('city', $this))->setParams($params);
	}


	/**
	 * @url /diagnostic/
	 *
	 * @return Response
	 */
	public function diagnostic()
	{
		$params = [];
		return (new Response('diagnostic', $this))->setParams($params);
	}


	/**
	 * @url /clinic/list/start/$startFrom/count/$countList/city/$cityID/type/$clinicType/district/$districtId/stations/$stationsID/near/$nearMode/speciality/$specialityID/street/$streetId/order/$order/workAllTime/$workAllTime
	 *
	 * @param int $startFrom Начиная с какого порядкого номера вернуть список врачей
	 * @param int $countList Сколько врачей должно быть в списке
	 * @param int $cityID Идентификатор города
	 * @return Response
	 */
	public function clinicList($startFrom, $countList, $cityID)
	{
		$params = [
			'start' => $startFrom,
			'count' => $countList,
			'city' => $cityID
		];
		return (new Response('clinic/list', $this))->setParams($params);
	}


	/**
	 * @url /area/
	 *
	 * @return Response
	 */
	public function area()
	{
		$params = [];
		return (new Response('area', $this))->setParams($params);
	}


	/**
	 * @url /district/city/$cityID/area/$areaID
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @param int $areaID Уникальный числовой идентификатор округа
	 * @return Response
	 */
	public function district($cityID, $areaID)
	{
		$params = [
			'city' => $cityID,
			'area' => $areaID
		];
		return (new Response('district', $this))->setParams($params);
	}


	/**
	 * @url /slot/list/doctor/$ID_DOCTOR/clinic/$ID_CLINIC/from/$START_DATE/to/$FINISH_DATE//slot/list/diagnostic/$ID_DIAGNOSTIC/clinic/$ID_CLINIC/from/$START_DATE/to/$FINISH_DATE/
	 *
	 * @return Response
	 */
	public function slotListSlotList()
	{
		$params = [];
		return (new Response('slot/list/slot/list', $this))->setParams($params);
	}


	/**
	 * @url /speciality/city/$cityID/
	 *
	 * @return Response
	 */
	public function speciality()
	{
		$params = [];
		return (new Response('speciality', $this))->setParams($params);
	}


	/**
	 * @url /metro/city/$cityID/
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @return Response
	 */
	public function metro($cityID)
	{
		$params = [
			'city' => $cityID
		];
		return (new Response('metro', $this))->setParams($params);
	}


	/**
	 * @url /street/city/$cityID/
	 *
	 * @param int $cityID Уникальный числовой идентификатор города
	 * @return Response
	 */
	public function street($cityID)
	{
		$params = [
			'city' => $cityID
		];
		return (new Response('street', $this))->setParams($params);
	}


	/**
	 * @url /json/service/list
	 *
	 * @return Response
	 */
	public function jsonServiceList()
	{
		$params = [];
		return (new Response('json/service/list', $this))->setParams($params);
	}


	/**
	 * @url /autocomplete
	 *
	 * @param int $city идентификатор города
	 * @param string $search текст который пытаемся найти
	 * @return Response
	 */
	public function autocomplete($city, $search)
	{
		$params = [];
		return (new Response('autocomplete', $this))->setParams($params);
	}


	/**
	 * @url /stat/city/$cityID/
	 *
	 * @return Response
	 */
	public function stat()
	{
		$params = [];
		return (new Response('stat', $this))->setParams($params);
	}


	/**
	 * @url /page
	 *
	 * @param string $alias название страницы
	 * @return Response
	 */
	public function page($alias)
	{
		$params = [];
		return (new Response('page', $this))->setParams($params);
	}


	/**
	 * @url /request
	 *
	 * @param int $clinicID Идентификатор клиники
	 * @return Response
	 */
	public function request($clinicID)
	{
		$params = [];
		return (new Response('request', $this))->setParams($params);
	}
}
