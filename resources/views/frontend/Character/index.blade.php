@extends('frontend/index')

@section('title','|  總字表')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">篇簡表</div>
	<div class="panel-body">
		<p>總字數:{{count($character_number)}}</p>

	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped ch">
	        <thead>
	          <tr>

                <th>字序</th>
                <th>篇章</th>
	              <th>隸定</th>
								<th>釋字</th>




	          </tr>
	        </thead>

	        <tbody>
	        @foreach($characters as $character)
	          <tr>

	            <td>{{$character->order}}</td>
              <td>{{$character->article->title}}</td>
							<td>{{$character->scribe}}</td>
							<td>{{$character->explanation}}</td>



	          </tr>
	        @endforeach
	        </tbody>
	    </table>
      {{$characters->links()}}
	</div>
</div>
@endsection
