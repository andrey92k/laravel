@extends('layouts.default')
@include('layouts.menu')

<div class="container">
	<div class="row">
		<h1>Import</h1>
		<div class="col-sm-12">
			<form action="import" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="file" name="file">
				<button type="submit">Отп</button>
			</form>
		</div>	
	</div>
</div>	
