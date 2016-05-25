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


    // Returns an array of articles that have the query string located somewhere within
    // our articles titles. Paginates them so we can break up lots of search results.
  	$recepten = DB::table('recepten')->where('titel', 'LIKE', '%' . $request->input('search') . '%')->paginate(10);

	// returns a view and passes the view the list of articles and the original query.
    return view('search', compact('recepten', 'query'));
 	}


}