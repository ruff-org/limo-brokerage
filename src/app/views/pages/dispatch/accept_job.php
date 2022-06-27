<style>
	.view-content{
		max-width: 700px;
		position: relative;
		margin-left:auto;
		margin-right:auto;
	}
</style>
<div class="view-content pt-5">
	<?php if(isset($page_data['reservation'])): ?>
	    <br />
	    <div class="py-5">
		    <h3 class="text-lg">
		    	Vendor Name
		    </h3>
		    <p class="pl-5">
		    	<?php 
		    		if($page_data['reservation']['vendor_name'] === ''){
		    			echo 'None set.';
		    		}
		    		else {
		    			echo $page_data['reservation']['vendor_name'];
		    		}
		    	?>
		    </p>
	    </div>
	    <hr />
	    <div class="py-5">
			<h3 class="text-lg">
				Customer Name
			</h3>
			<p class="pl-5">
				<?php echo $page_data['reservation']['customer_name']; ?>
			</p>
		</div>
		<hr />
		<div class="py-5">
			<h3 class="text-lg">
				Reservation Number
			</h3>
			<p class="pl-5">
				<?php echo $page_data['reservation']['reservation_number']; ?>
			</p>
		</div>
		<hr />
		<div class="py-5">
			<h3 class="text-lg">
				Pickup Date
			</h3>
			<p class="pl-5">
				<?php echo $page_data['reservation']['pickup_date']; ?>
			</p>
		</div>
		<hr />
		<div class="py-5">
			<h3 class="text-lg">
				Pickup Time
			</h3>
			<p class="pl-5">
				<?php echo $page_data['reservation']['pickup_time']; ?>
			</p>
		</div>
		<hr />
		<div class="py-5">
			<h3 class="text-lg">
				Pickup Info
			</h3>
			<p class="pl-5">
				<address class="pl-10 pt-5">
					<?php echo str_replace(';', '<br />', $page_data['reservation']['pickup_info']); ?>
				</address>
			</p>
		</div>
	<?php endif; ?>
	<br />
</div>