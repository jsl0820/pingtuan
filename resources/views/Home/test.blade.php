<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach($cats as $k => $v)
		@if($v->cat_id == 1)
		<span>111</span>
		@else
        <li><a href="" class="cur">{{$v->cat_name}}</a></li>
        @endif
	@endforeach
</html>