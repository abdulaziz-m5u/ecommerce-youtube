<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
    public function cities(Request $request)
	{
		$cities = $this->getCities($request->query('provinceId'));
		return response()->json([
                'status' => 200,
                'cities' => $cities
            ]);
    }
    
    public function shippingCost(Request $request)
	{
		$items = \Cart::getContent();

        $totalWeight = 0;
		foreach ($items as $item) {
			$totalWeight += ($item->quantity * $item->associatedModel->weight);
		}

        $destination = $request->query('city');
		return $this->getShippingCost($destination, $totalWeight);
    }

	public function setShipping(Request $request)
	{
		\Cart::removeConditionsByType('shipping');

		$items = \Cart::getContent();

        $totalWeight = 0;
		foreach ($items as $item) {
			$totalWeight += ($item->quantity * $item->associatedModel->weight);
		}

		$shippingService = $request->get('shipping_service');
		$destination = $request->get('city_id');

		$shippingOptions = $this->getShippingCost($destination, $totalWeight);

		$selectedShipping = null;
		if ($shippingOptions['results']) {
			foreach ($shippingOptions['results'] as $shippingOption) {
				if (str_replace(' ', '', $shippingOption['service']) == $shippingService) {
					$selectedShipping = $shippingOption;
					break;
				}
			}
		}

		$status = null;
		$message = null;
		$data = [];
		if ($selectedShipping) {
			$status = 200;
			$message = 'Success set shipping cost';

			$this->addShippingCostToCart($selectedShipping['service'], $selectedShipping['cost']);

			$data['total'] = number_format(\Cart::getTotal());
		} else {
			$status = 400;
			$message = 'Failed to set shipping cost';
		}

		$response = [
			'status' => $status,
			'message' => $message
		];

		if ($data) {
			$response['data'] = $data;
		}

		return $response;
	}

	private function addShippingCostToCart($serviceName, $cost)
	{
		$condition = new \Darryldecode\Cart\CartCondition(
			[
				'name' => $serviceName,
				'type' => 'shipping',
				'target' => 'total',
				'value' => '+'. $cost,
			]
		);

		\Cart::condition($condition);
	}
}
