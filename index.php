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
<?php global $myglobals
?>
	 <h1 class="h2 text-center mb-4 header">Bosschez Weather App</h1>
	 <div class="container overflow-hidden bottom">
	 	<div class="row justify-content-around">
			<?php foreach ($myglobals['api_body']['list'] as $id => $group) : ?>
				<div class="col-sm-5 card shadow rounded mb-4 g-1 ">
					<div class="text-center p-2">
						<p class="my-0"><span class="text-muted">City: </span><?php echo $group['name']; ?></p>
						<p><span class="text-muted">Today: </span><?php echo date('l jS \of F Y', $group['dt']); ?></p>
						<i <?php echo $class = ($group['weather'][0]['main'] === 'Clouds') ? 'class="bi bi-clouds-fill"' :
						(($group['weather'][0]['main'] === 'Haze') ? 'class="bi bi-cloud-haze2-fill"' :
						(($group['weather'][0]['main'] === 'Rain') ? 'class="bi bi-cloud-rain-heavy"' :
						(($group['weather'][0]['main'] === 'Clear') ? 'class="bi bi-brightness-high-fill"' :
						(($group['weather'][0]['main'] === 'Thunderstorm') ? 'class="bi bi-cloud-lightning-rain-fill"' :
						(($group['weather'][0]['main'] === 'Mist') ? 'class="bi bi-cloud-drizzle"' :
						(($group['weather'][0]['main'] === 'Fog') ? 'class="bi bi-cloud-fog2"' :
						(($group['weather'][0]['main'] === 'Snow') ? 'class="bi bi-snow2"' :
						'class="bi bi-cloud-fill"'))))))); ?>></i>
						<p class="display-6"><?php echo round($group['main']['temp']); ?>°</p>
						<small class="mb-4"><span class="text-muted">Expectation: </span><?php echo $group['weather'][0]['description']; ?></small>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	   </div>
	
	<footer class="footer py-3 bg-light text-center">
	  <div class="container">
	    <span class="lead">A Simple Weather App Landing Page &copy 2022. Created by <a href="https://www.linkedin.com/in/frank-okpalaku/">Bosschez</a></span>
	  </div>
	</footer>
		
	<?php wp_footer() ?>
</body>
</html>