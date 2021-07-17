<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PaginasController extends Controller
{

  public function home()
	{

			return view('paginas.home');

	}
}
