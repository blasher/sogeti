<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NYTimesFetchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = $this->fetchNYTimes();
        return view('page', ['content' => $content]);
    }


    /**
     * Fetch NY Times data.
     *
     */
    public function fetchNYTimes()
    {
        $out = '';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $query = array(
             "api-key" => "512098c5926343cb9195da8c57fcda2c"
        );
	
        curl_setopt($curl, CURLOPT_URL,
            "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
        );
	
        $result = json_decode(curl_exec($curl));
        $out .= print_r($result, true);

/*
        $domain = 'api.nytimes.com';
        $apiKey = '512098c5926343cb9195da8c57fcda2c';

        $url    = 'https://' . $domain . '/svc/search/v2/articlesearch.json?' . 
                  'api-key=512098c5926343cb9195da8c57fcda2c';

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);


	// "https://api.nytimes.com/svc/search/v2/articlesearch.json?api-key=...";
        $out .= $url;
        $out .= "\n\n";
	
        // "200"
        $out .= $res->getStatusCode();
        $out .= "\n\n";

        // 'application/json; charset=utf8'
        $out .= print_r( $res->getHeader('content-type'), true );
        $out .= "\n\n";

        // {"type":"User"...'
        $out .= print_r( $res->getBody(), true );
        $out .= "\n\n";
*/
        return $out;
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
