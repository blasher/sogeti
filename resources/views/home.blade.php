@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  You are logged in!
                  <br />
                  <h4>Menu</h4>
                  <ol>
                    <li><a href="/fetchNYTimes">Fetch and store NY Times Data</a></li>
                    <li><a href="/updates">Updates Hourly and via API call</a></li>
                    <li><a href="/api_calls">API calls</a></li>
                    <li><a href="/testcases">TestCases</a></li>
                    <li><a href="/testcases">Virtual Server</a></li>
                    <li><a href="/stackoverflow">StackOverflow Information</a></li>
                    <li><a href="/github">Github Information</a></li>
                    <li><a href="/disclaimer">Disclaimer</a></li>
                  </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
