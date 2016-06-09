<?php

namespace App\Http\Controllers;

use DB;
use App\Recept;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Company;
use App\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QueryController extends Controller
{


    public function search(Request $request)
	{



  	$recepten = DB::table('recepten')->where('titel', 'LIKE', '%' . $request->input('search') . '%')->get();

	// returns a view and passes the view the list of articles and the original query.
    return view('search', compact('recepten', 'query'));
 	}


}