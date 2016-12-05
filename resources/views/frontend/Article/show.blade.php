@extends('frontend/index')

@section('title','| All Articles')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Aricle</div>
	<div class="panel-body">
		<p>Manage all articles.</p>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
	        <thead>
	          <tr>
	              <th>ID </th>
	              <th>篇章</th>
								<th>出處</th>
                <th>竹簡</th>
	          </tr>
	        </thead>

	        <tbody>
	        @foreach($articles as $article)
	          <tr>
	            <td>{{$article->id}}</td>
	            <td>{{$article->title}}</td>
							<td>{{$article->resource}}</td>
              <td>{{$article->slips}}</td>
	          </tr>
	        @endforeach
	        </tbody>
	    </table>

	</div>
</div>
@endsection
