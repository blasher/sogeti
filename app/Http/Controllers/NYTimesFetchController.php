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
        $docs = $this->fetchNYTimes();

        foreach($docs as $doc)
	{
            $this->storeNYTimesArticle($doc);
        }

        $articles = NYTimesArticle::all();

        return view('articles', ['articles' => $articles]);
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
     * @param $doc
     */
    public function storeNYTimesArticle( $doc )
    {
        $article = NYTimesArticle::where('url', $doc->web_url)->first();
        if( is_null( $article ) )
	{  $article = new NYTimesArticle();
	}

        $article->headline = $doc->headline->main;
        $article->url      = $doc->web_url;
        $article->save();
    }

}
