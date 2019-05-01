@extends('layout')

@section('title', 'Home')

@section('main')
	<body>
		<table class="table">
			<tr>
				<th>Travel Events</th>
				<th>Destination</th>
				<th>Posted By</th>
			</tr>
			@foreach($posts as $post)
		      <tr>
		        <td>
					{{$post->PostTitle}}
		        </td>
		        <td>
		        	{{$post->PostDest}}
		        </td>
		        <td>
		        	{{$post->UserName}}
		        </td>
		      </tr>
		    @endforeach
		</table>
	</body>
@endsection