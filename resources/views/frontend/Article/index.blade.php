@extends('frontend/index')

@section('title','| All Articles')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">全簡表</div>
	<div class="panel-body">
		<p>簡條</p>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
	        <thead>
	          <tr>

	              <th>簡序</th>
								<th>內文</th>
                <th>篇名</th>


	          </tr>
	        </thead>

	        <tbody>
	        @foreach($slips as $slip)
	          <tr>

	            <td>{{$slip->order}}</td>
							<td>{{$slip->content}}</td>
              <td>{{$slip->articles->title}}</td>


	          </tr>
	        @endforeach
	        </tbody>
	    </table>

	</div>
</div>
@endsection
