@extends('frontend/index')

@section('title','| All Slips')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">篇簡表</div>
	<div class="panel-body">
		<p>總簡條:{{count($slips)}}</p>

	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped ch">
	        <thead>
	          <tr>

	              <th>篇名</th>
								<th>簡序</th>
								<th>字數</th>
                <th>內容</th>


	          </tr>
	        </thead>

	        <tbody>
	        @foreach($slips as $slip)
	          <tr>

	            <td>{{$slip->article->title}}</td>
							<td>{{$slip->order}}</td>
							<td>{{count($slip->characters)}}</td>
              <td>{{$slip->content}}</td>


	          </tr>
	        @endforeach
	        </tbody>
	    </table>
      {{$slips->links()}}
	</div>
</div>
@endsection
