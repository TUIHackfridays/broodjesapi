<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

/**
 * Class ApiController
 *
 *	@SWG\Tag(
		name="system",
		description="info endpoints"
	)
 */
class BroodjesController extends BaseController
{
	public function sandwich()
	{
		$broodjes = [
			0 => [
				'title'       => 'Broodje Kaas',
				'ingredients' => 'Boter, Kaas, Tomaat, Sla, Ei, mayonnaise',
				'uri'         => 'http://broodjesapi.tuihackfridays.com/images/cheese-sandwich.png',
			],
			1 => [
				'title'       => 'Broodje Ham',
				'ingredients' => 'Boter, Ham, Tomaat, Sla, Ei, mayonnaise',
				'uri'         => 'http://broodjesapi.tuihackfridays.com/images/ham-sandwich.jpg',
			],
			2 => [
				'title'       => 'Club',
				'ingredients' => 'Boter, Kaas, Ham, Tomaat, Sla, Ei, mayonnaise',
				'uri'         => 'http://broodjesapi.tuihackfridays.com/images/club-sandwich.jpg',
			],
			3 => [
				'title'       => 'Oriental',
				'ingredients' => 'Kip-Curry Salade, Ananas',
				'uri'         => 'http://broodjesapi.tuihackfridays.com/images/oriental-sandwich.jpg',
			],
			4 => [
				'title'       => 'Boulette',
				'ingredients' => 'Tomaat, Kalkoengehaktbal, Mosterd, Ketchup',
				'uri'         => 'http://broodjesapi.tuihackfridays.com/images/boulette-sandwich.jpg',
			],
		];

		return response()->json( $broodjes );
	}
}
