@extends('frontend/index')

@section('title','| {{$articles->title}}')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">{{$articles->title}}</div>
	<div class="panel-body">
		<p>總簡條數:{{count($articles->slips)}}</p>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped ch">
			<thead>
				<tr>
					<th>簡序</th>
					<th>內文</th>

				</tr>
				</thead>
				<tbody>
						@foreach($articles->slips as $slip)
					<tr>

						<td>
							{{$slip->order}}
						</td>
						<td>
							{{$slip->content}}
						</td>

					</tr>
						@endforeach
				</tbody>
	    </table>

	</div>
</div>
@endsection
