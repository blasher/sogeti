<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NYTimesArticle;

class APIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Retrun all NY Times Articles.
     *
     * @return string
     */
    public function index()
    {
        $articles = NYTimesArticle::all();
	
        return json_encode( $articles );
    }

    /**
     * Retrun first NY Times Articles.
     *
     * @return string
     */
    public function first()
    {
        $articles = NYTimesArticle::get()->first();
	
        return json_encode( $articles );
    }

    /**
     * Retrun last NY Times Articles.
     *
     * @return string
     */
    public function last()
    {
        $articles = NYTimesArticle::get()->last();
	
        return json_encode( $articles );
    }

    /**
     * Retrun an NY Times Article by ID.
     * 
     * @param  int    $id
     * @return string
     */
    public function byId(int $id)
    {
        $articles = NYTimesArticle::findorFail($id);
	
        return json_encode( $articles );
    }
}
