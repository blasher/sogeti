<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NYTimesArticle;

class NYTimesFetchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $docs = print_r( $this->guzzleNYTimes(), true);
        $docs = print_r( $this->fetchNYTimes(), true);

//      $content = $this->storeNYTimes();

        return view('page', ['content' => $docs]);
    }

    /**
     * Fetch NY Times data via curl request.
     *
     * @return $docs
     */
    public function fetchNYTimes()
    {
        $out = '';

        $domain = 'api.nytimes.com';
        $apiKey = '512098c5926343cb9195da8c57fcda2c';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $query = array(
             'api-key' => '512098c5926343cb9195da8c57fcda2c'
        );

        curl_setopt($curl, CURLOPT_URL,
             'https://' . $domain . '/svc/search/v2/articlesearch.json?' .
	     http_build_query($query)
        );

        $result = json_decode(curl_exec($curl));
        $docs   = $result->response->docs;

        return $docs;
    }
    
    /**
     * Fetch NY Times data with GuzzleClient.
     *
     * @return $docs
     */
    public function guzzleNYTimes()
    {
        $domain = 'api.nytimes.com';
        $apiKey = '512098c5926343cb9195da8c57fcda2c';

        $url    = 'https://' . $domain . '/svc/search/v2/articlesearch.json?' . 
                  'api-key=512098c5926343cb9195da8c57fcda2c';

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $url);
//      dd($res->getStatusCode());

        $docs = $res->getBody();

        return $docs;
    }

    /**
     * Store NY Times data in DB.
     *
     * @param $docs
     */
    public function storeNYTimes()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
