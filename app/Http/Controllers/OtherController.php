<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page', ['page_content' => $content]);
    }

    /**
     * Show the updates dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function updates()
    {
        $content = <<<EOT
<ol>
<li>If you wanted the database to be updated every hour, how would you trigger this data collection? <br /><br /><span style="font-style:italic; color:#3097D1">I would pull the code out of NYTimesArticleController.php, put it into a service provider, and of course, replace the code in the controller with calls to the code in the service provider. Then, simply set up a laravel task/shcedule to run every hour.  Alternatively, I could set up a cron that executes a php script with a few curl statements in that would first login to the site and then call the url for the NYTimes page.</span></li>
<li>If you wanted the database to be updated every time the user queried the API (question #3), how
would you do that? <br /><br /><span style="font-style:italic; color:#3097D1">Once again, pull the code out of the controller, create a service provider with that code, and replace the controller code with calls to the service provider.  Then in the API controller, add calls to the service provider.</span></li>
</ol>
EOT;
        return view('page', ['page_content' => $content]);
    }

    /**
     * Show the api_call dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_calls()
    {
        $content = <<<EOT
<ol>
<li><a href="/articles/all">/articles/all</a></li>
<li><a href="/articles/first">/articles/first</a></li>
<li><a href="/articles/last">/articles/last</a></li>
<li><a href="/articles/5">/articles/5</a></li>
</ol>
EOT;

        return view('page', ['page_content' => $content]);
    }
    
    /**
     * Show the testcase dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function testcases()
    {
        return view('page', ['page_content' => $content]);
    }

    /**
     * Show the stackoverflow dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function stackoverflow()
    {
       $content = 'StackOverflow Page: <a href="https://stackoverflow.com/users/3166856/brian-lasher">Click Here</a>';

       return view('page', ['page_content' => $content]);
    }

    /**
     * Show the github dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function github()
    {
       $content = 'GitHub Page: <a href="https://github.com/blasher">Click Here</a>';

       return view('page', ['page_content' => $content]);
    }

    /**
     * Show the disclaimer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function disclaimer()
    {
        $content = <<<EOT
<ol>
<li></li>
<li></li>
</ol>
EOT;

       return view('page', ['page_content' => $content]);
    }

}
