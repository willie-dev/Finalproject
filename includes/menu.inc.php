<h2 class="pt-3 " style="color:#fff">
<?php
	if (isset($_SESSION['employer']))
	echo '<marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="alternate">Create more Job opportunities in the Community!</marquee>';
	else{
	echo '<marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="alternate">Find a job that matches your qualifications today!</marquee>';
	}
	?>
</h2>