@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <table class="table">
                       @foreach($articles as $article)
                       <tr>
                         <td>{{ $article->headline }}</td>
                         <td><a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a></td>
                       </tr>
                       @endforeach
                    </table class="table">
                    <br /><br />
		    <a href="/">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
