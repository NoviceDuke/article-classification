@extends('frontend/index')

@section('title','| All Articles')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">篇章表</div>
	<div class="panel-body">
		<p>總篇章:{{count($articles)}}</p>
		<p>總簡條:{{count($slips)}}</p>
		<p>總字數:{{count($characters)}}<p>



	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
	        <thead>
	          <tr>

	              <th>篇名</th>
								<th>出處</th>
                <th>簡數</th>
								<th>字數</th>


	          </tr>
	        </thead>

	        <tbody>
	        @foreach($articles as $article)
	          <tr>

	            <td><a href={{route('frontend.article.show',$article->id)}}">{{$article->title}}</a></td>
							<td>{{$article->resource}}</td>
              <td>{{count($article->slips)}}</td>
							<td>{{count($article->characters)}}</td>

	          </tr>
	        @endforeach
	        </tbody>
	    </table>

	</div>
</div>
@endsection
