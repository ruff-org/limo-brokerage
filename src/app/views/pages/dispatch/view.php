<style>
	.view-content{
		max-width: 700px;
		position: relative;
		margin-left:auto;
		margin-right:auto;
	}
</style>
<script>
	// POST to: /submit/updatedriver
	function update_driver(id){
		let updateDriver = document.getElementById('update-driver');
		let postObject = {
			reservationId: id,
			newDriver: updateDriver.value
		};
		let post = JSON.stringify(postObject);
		const url = "<?php echo Uri::base(); ?>api/updatedriver";
		let xhr = new XMLHttpRequest();
		xhr.open('POST', url, true);
		xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
		xhr.send(post);
		xhr.onload = function(){
			if(xhr.status === 200){
				console.log("Post successfully created!");
				document.getElementById('assigned-driver').innerHTML = updateDriver.options[updateDriver.selectedIndex].text;
			}	
		};
	}
</script>
<div class="view-content pt-5">
	<?php if(isset($page_data['reservation'])): ?>
		<a href="<?php echo Uri::base(); ?>profile/" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
	        Go Back
	    </a>
	    <br /><br />
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
				<?php echo str_replace(';', '<br />', $page_data['reservation']['pickup_info']); ?>
			</p>
		</div>
		<hr />
		<div class="py-5">
			<h3 class="text-lg">
				Assigned Driver
			</h3>
			<p class="pl-5">
				<?php 
					if($page_data['driver'] === null){
						echo '<span id="assigned-driver">None assigned.</span>';
					} else {
						echo '<span id="assigned-driver">';
						echo $page_data['driver']['driver_name'];
						echo '</span>';
					}
					
					echo '<select class="ml-3 p-1 border-solid border-black border-2" id="update-driver" onchange="update_driver(' . $page_data['reservation']['id'] . ')">';
					if(!empty($page_data['drivers'])){
						echo '<option>Please select a driver</option>';
						foreach($page_data['drivers'] as $driver){
							echo '<option value="' . $driver['id'] . '">';
							echo $driver['driver_name'];
							echo '</option>';
						}
					} else {
						echo '<option>No driver to assign.</option>';
					}
					echo '</select>';
				?>
			</p>
		</div>
	<?php endif; ?>
</div>