@include('layouts.default')
@include('layouts.menu')
<div class="container">
	<div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Count Staff
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="{{Request::url()}}">10</a>
			<a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['count_staff' => 25])) }}">25</a>
			<a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['count_staff' => 50])) }}">50</a>
			<a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['count_staff' => 100])) }}">100</a>
		</div>
	</div>
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Full Name</th>
					<th scope="col">DOB</th>
					<th scope="col">Department</th>

					<th scope="col">Position</th>
					<th scope="col">Type</th>
					<th scope="col">Payment</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($staffs as $staff)
				<tr>
					<th scope="row">{{ $staff->id }}</th>
					<td>{{ $staff->full_name }}</td>
					<td>{{ $staff->dob }}</td>
					<td>{{ $staff->department->title }}</td>
					<td>{{ $staff->position }}</td>
					@if($staff->rate =='0')         
					<td>hourly fee</td>         
					@else
					<td>Rate</td>        
					@endif
				
					<td>{{ $staff->payment }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>



		{{ $staffs->appends(request()->all())->links() }}
	</div>
</div>