<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Weather App</title>
	<?php wp_head(); ?>
</head>
<body  <?php body_class() ?>>
    <?php wp_body_open(); ?>
<?php $args = [
		'chicago' => [
			'body' => ['location'	=> 'chicago'],

			'headers' => [
								'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
								'Content-Type' => 'application/json'
							]
					],
		'london'	=> [
			'body' => ['location'	=> 'london'],

			'headers' => [
						'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
						'Content-Type' => 'application/json'],
				],

		'amsterdam' => [
			'body' => ['location'	=> 'amsterdam'],

			'headers' => [
							'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
							'Content-Type' => 'application/json']
				],

		'paris' => [
			'body' => ['location'	=> 'paris'],

			'headers' => [
							'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
							'Content-Type' => 'application/json']
				],
		'mumbai' => [
			'body' => ['location'	=> 'mumbai'],

			'headers' => [
							'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
							'Content-Type' => 'application/json']
				],

		'melbourne' => [
			'body' => ['location'	=> 'melbourne'],

			'headers' => [
							'Authorization' => 'Bearer ZDZhMWE3ZjMtNmU5MC00MTdhLWIzY2YtNDUxMDhiMjUzMzM5',
							'Content-Type' => 'application/json']
				],
	];

	?>
	<?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['london']);
		$body = json_decode(wp_remote_retrieve_body($res),true);
	 ?>

	 <?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['chicago']);
		$lonBody = json_decode(wp_remote_retrieve_body($res),true);
	 ?>

	 <?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['amsterdam']);
		$amsBody = json_decode(wp_remote_retrieve_body($res),true);
	 ?>
	 <?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['paris']);
		$parBody = json_decode(wp_remote_retrieve_body($res),true);
	 ?>
	 <?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['mumbai']);
		$mumBody = json_decode(wp_remote_retrieve_body($res),true);
	 ?>

	 <?php $res = wp_remote_get('https://api.m3o.com/v1/weather/Forecast',$args['melbourne']);
		$melBody = json_decode(wp_remote_retrieve_body($res),true);
	 ?>
	<!-- <pre><?php var_dump($body) ?></pre> -->
	 <h5 class="h2 display-4 text-center mb-4 lead header">Bosschez Weather App</h5>
	 <div class="container overflow-hidden bottom">
	 	<div class="row justify-content-around">
	 		<div class="col-sm-4 card shadow rounded mb-4">
			 	<div class="text-center p-2">
			 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $body['region'] ?></p>
					<p class="my-0"><span class="text-muted">City: </span><?php echo $body['location']; ?></p>
					<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($body['forecast'],'date')[0])) ?></p>
					<i <?php echo $bool = $body['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
					<p class="display-6"><?php echo round($body['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
		 <div class="col-sm-3 card shadow rounded mb-4">
		 	<div class="text-center p-2">
		 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $lonBody['region'] ?></p>
				<p class="my-0"><span class="text-muted">City: </span><?php echo $lonBody['location']; ?></p>
				<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($lonBody['forecast'],'date')[0])) ?></p>
				<i <?php echo $bool = $lonBody['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
				<p class="display-6"><?php echo round($lonBody['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
		 <div class="col-sm-4 card rounded mb-4">
		 	<div class="text-center p-2">
		 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $amsBody['region'] ?></p>
				<p class="my-0"><span class="text-muted">City: </span><?php echo $amsBody['location']; ?></p>
				<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($amsBody['forecast'],'date')[0])) ?></p>
				<i <?php echo $bool = $amsBody['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
				<p class="display-6"><?php echo round($amsBody['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
	 	</div>
	 	<div class="row justify-content-around">
	 		<div class="col-sm-4 card rounded shadow">
			 	<div class="text-center p-2">
			 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $parBody['region'] ?></p>
					<p class="my-0"><span class="text-muted">City: </span><?php echo $parBody['location']; ?></p>
					<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($parBody['forecast'],'date')[0])) ?></p>
					<i <?php echo $bool = $parBody['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
				<p class="display-6"><?php echo round($parBody['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
		 <div class="col-sm-3 card rounded shadow">
		 	<div class="text-center p-2">
		 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $mumBody['region'] ?></p>
				<p class="my-0"><span class="text-muted">City: </span><?php echo $mumBody['location']; ?></p>
				<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($mumBody['forecast'],'date')[0])) ?></p>
				<i <?php echo $bool = $parBody['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
				<p class="display-6"><?php echo round($parBody['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
		 <div class="col-sm-4 card rounded shadow">
		 	<div class="text-center p-2">
		 		<p class="mb-0"><span class="text-muted">State/Region: </span><?php echo $melBody['region'] ?></p>
				<p class="my-0"><span class="text-muted">City: </span><?php echo $melBody['location']; ?></p>
				<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y ',strtotime(array_column($melBody['forecast'],'date')[0])) ?></p>
				<i <?php echo $bool = $melBody['forecast'][0]['will_it_rain'] ? 'class="bi bi-cloud-rain-heavy"' : 'class="bi bi-brightness-high"';?>></i>
				<p class="display-6"><?php echo round($melBody['forecast'][0]['avg_temp_c']) ?>°</p>
		 	</div>
		 </div>
	 	</div>
	</div>
	 
	 

	<footer class="footer py-3 bg-secondary text-center">
	  <div class="container">
	    <span class="text-light">A Simple Weather App Landing Page &copy 2022.</span>
	  </div>
	</footer>
		
	<?php wp_footer() ?>
</body>
</html>