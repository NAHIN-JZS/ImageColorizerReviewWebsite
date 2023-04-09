<!DOCTYPE html>
<html>
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photosnap - Home</title>
    <link rel="stylesheet" href="styles/css/main.css">

    <!-- <style>
    .container {
  display: flex;
  align-items: center;
  justify-content: center; /* optional, to horizontally center the child elements */
  height: 100%; /* set the height of the container element */
}

p {
  margin: 0; /* optional, to remove default margin */
}
</style> -->
    </head>
    <body>
        <!-- <p> Thank you for your help. This tab will automatically close in 10 seconds.</p> -->
        <div  style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 0 55px; text-align: center;">
                                    <h2>Thank you for your help.</h2>
                                    <p class="opaque-black">This tab will automatically close in 10 seconds.
                                    </p>
                </div>
        
        <script>
		setTimeout(function() {
			window.close();
		}, 10000); // 10000 milliseconds = 10 seconds
	</script>
    </body>
</html>