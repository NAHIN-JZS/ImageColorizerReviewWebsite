<!DOCTYPE html>
<html>
    <body>
        <!-- <p> Thank you for your help. This tab will automatically close in 10 seconds.</p> -->
        <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 0 55px; text-align: center;">
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