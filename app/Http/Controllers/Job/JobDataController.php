<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Data\Position;
use App\Models\Data\ShipType;
use App\Models\Data\StcwRegulation;
use App\Models\Data\SeamanBookType;
use App\Models\Data\CertificateType;
use App\Models\Data\Language;

class JobDataController extends Controller
{
    public function __invoke()	{

        $data = [
        			'positions' => Position::all()->map( function($item) { return ['id' => $item->id, 'text' => $item->label]; }),
			        'ship_types' => ShipType::all()->map( function($item) { return ['id' => $item->id, 'text' => $item->label]; }),
			        'stcw_regulations' => StcwRegulation::all()->map( function($item) { return ['id' => $item->id, 'text' => $item->regulation]; }),
			        'seaman_book_types' => SeamanBookType::all()->map( function($item) { return ['id' => $item->id, 'text' => $item->label]; }),
			        'certificate_types' => CertificateType::all()->map( function($item) { return ['id' => $item->id, 'text' => $item->label]; }),
			        'languages' => Language::all()->map( function($item) { return ['id' => $item->id, 'text' => strtoupper($item->label)]; }),
        		];

        return response()->json($data);
    }
}
