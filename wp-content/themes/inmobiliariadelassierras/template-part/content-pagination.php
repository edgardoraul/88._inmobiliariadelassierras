<div class="row my-3 row justify-content-center">
	<div class="col-12">
		<?php
		if ( function_exists( "pagination" ) )
		{
			if ( pagination() )
			{
				pagination();
			}
		};?>
	</div>
</div>