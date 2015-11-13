<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">


</head>
<body>
<div class="container">
    <div class="content">

        <table>
<?php $i = 1; ?>
            @foreach($slides as $slide)
                <div class="{{ $slide->id <= 1 ? 'item active' : 'item '}}" style="">
                <p>{{ $slide->id }}</p>
					<?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
    <div class="<?php echo $item_class; ?>">
	<?php $i++; ?>
            @endforeach
			<hr>
			 @foreach($slides as $index => $slide)
			<div class="item @if($index == 0) {{ 'active' }} @endif">
			 <p>{{ $slide->id }}</p>
			 @endforeach
        </table>
    </div>
</div>
</body>
</html>
