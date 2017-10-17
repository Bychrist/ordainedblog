@if(count($errors) > 0 )
	<div id="errors">
		@foreach($errors->all() as $error)
			<span id="para" style="color:#FC0707">{{$error}}&nbsp;|</span>
		@endforeach
	</div>
		
 	
@endif
