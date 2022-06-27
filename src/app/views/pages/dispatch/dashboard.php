<?php if(!empty($page_data['drivers'])): ?>
	<style>
		#driver-0{
			display:none;
		}
	</style>
<?php endif; ?>
<?php if(!empty($page_data['rules'])): ?>
	<style>
		#rule-0{
			display:none;
		}
	</style>
<?php endif; ?>
<script>
	function delete_driver(id){
		let confirmAction = confirm("Are you sure you want to delete this driver?");
		if(confirmAction){
			let postObject = {
				driverId: id,
			};
			let post = JSON.stringify(postObject);
			const url = "<?php echo Uri::base(); ?>api/deletedriver";
			let xhr = new XMLHttpRequest();
			xhr.open('POST', url, true);
			xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
			xhr.send(post);
			xhr.onload = function(){
				if(xhr.status === 200){
					console.log("Driver successfully deleted!");
					document.getElementById('driver-' + id).style.display = "none";
					if(document.getElementById('all-drivers').childElementCount == 2){
						document.getElementById('driver-0').style.display = "block";
					}
				}	
			};
		}
	}
	function delete_rule(id){
		let confirmAction = confirm("Are you sure you want to delete this rule?");
		if(confirmAction){
			let postObject = {
				ruleId: id,
			};
			let post = JSON.stringify(postObject);
			const url = "<?php echo Uri::base(); ?>api/deleterule";
			let xhr = new XMLHttpRequest();
			xhr.open('POST', url, true);
			xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
			xhr.send(post);
			xhr.onload = function(){
				if(xhr.status === 200){
					console.log("Rule successfully deleted!");
					document.getElementById('rule-' + id).style.display = "none";
					if(document.getElementById('all-rules').childElementCount == 2){
						document.getElementById('rule-0').style.display = "block";
					}
				}	
			};
		}
	}
	function emailPrompt(id){
		let email = prompt("Please enter the email.", "name@example.com");
		if(email != null){
			let name = prompt("Please enter the name", "The Recipient's Name");
			if(name != null){
				let postObject = {
					reservationId: id,
					toEmail: email,
					toName: name
				};
				let post = JSON.stringify(postObject);
				const url = "<?php echo Uri::base(); ?>api/email";
				let xhr = new XMLHttpRequest();
				xhr.open('POST', url, true);
				xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
				xhr.send(post);
				xhr.onload = function(){
					if(xhr.status === 200){
						alert("Email successfully sent!");
					}	
				};
			}
		}
	} 
</script>
<h2 class="text-2xl text-center pt-5">
	Reservations
</h2>

<div class="overflow-x-auto">
  <table class="min-w-full text-sm divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Name
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Email Address
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Pickup Date/Time
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Reservation Number
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center"></div>
        </th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-100">
	    <?php if(!empty($page_data['reservations'])): ?>
		    <?php foreach($page_data['reservations'] as $n => $rsvp): ?>
		      <tr>
		        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
		          <?php echo $rsvp['customer_name']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $rsvp['customer_email']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $rsvp['pickup_date'] . ' / ' . $rsvp['pickup_time']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $rsvp['reservation_number']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<a href="<?php echo Uri::base(); ?>view/<?php echo $rsvp['id']; ?>" title="<?php echo $rsvp['pickup_info']; ?>" class="hover:underline">
		        		View Info
		        	</a>
		        	&nbsp; &nbsp;
		        	<a href="#" onmousedown="emailPrompt(<?php echo $rsvp['id']; ?>);" class="hover:underline">
		        		Send Email
		        	</a>
		        </td>
		      </tr>
		      <?php endforeach; ?>
		<?php else: ?>
			<!-- Empty state -->
			<tr>
		        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
		          No reservations.
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
		        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
		        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
		        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
		    </tr>
		<?php endif; ?>
    </tbody>
  </table>
</div>

<br /> <br />

<h2 class="text-2xl text-center pt-5">
	Drivers
</h2>

<div class="overflow-x-auto">
  <table class="min-w-full text-sm divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Driver Name
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Vehicle Info
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Vehicle Color
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Passenger Limit
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Service Type
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap"></th>
      </tr>
    </thead>

    <tbody id="all-drivers" class="divide-y divide-gray-100">
    	<?php if(!empty($page_data['drivers'])): ?>
		    <?php foreach($page_data['drivers'] as $n => $driver): ?>
		      <tr id="driver-<?php echo $driver['id']; ?>">
		        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
		          <?php echo $driver['driver_name']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $driver['vehicle_info']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $driver['vehicle_color']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $driver['pass_limit']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $driver['service_type']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<a class="hover:underline" href="<?php echo Uri::base(); ?>edit_driver/<?php echo $driver['id']; ?>">
		        		Edit
		        	</a>
		        	&nbsp; &nbsp;
		        	<a class="hover:underline" href="#" onmouseup="delete_driver(<?php echo $driver['id']; ?>)">
		        		Delete
		        	</a>
		        </td>
		      </tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<!-- Empty state -->
		<tr id="driver-0">
	        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
	          No drivers.
	        </td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	    </tr>
    </tbody>
  </table>
  <div>
  <div class="m-5">
  	<a href="<?php echo Uri::base(); ?>add_driver/" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        Add Driver
    </a>
   </div>
  </div>
</div>

<br /><br />

<h2 class="text-2xl text-center pt-5">
	Rules
</h2>

<div class="overflow-x-auto">
  <table class="min-w-full text-sm divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Title
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
          <div class="flex items-center">
            Description
          </div>
        </th>
        <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
        </th>
      </tr>
    </thead>

    <tbody id="all-rules" class="divide-y divide-gray-100">
    	<?php if(!empty($page_data['rules'])): ?>
		    <?php foreach($page_data['rules'] as $n => $rule): ?>
		      <tr id="rule-<?php echo $rule['id']; ?>">
		        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
		          <?php echo $rule['title']; ?>
		        </td>
		        <td class="p-4 text-gray-700 whitespace-nowrap">
		        	<?php echo $rule['description']; ?>
		        </td>
		    	<td class="p-4 text-gray-700 whitespace-nowrap">
		        	<a class="hover:underline" href="<?php echo Uri::base(); ?>edit_rule/<?php echo $rule['id']; ?>">
		        		Edit
		        	</a>
		        	&nbsp; &nbsp;
		        	<a class="hover:underline" href="#" onmouseup="delete_rule(<?php echo $rule['id']; ?>)">
		        		Delete
		        	</a>
		        </td>
		      </tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<!-- Empty state -->
		<tr id="rule-0">
	        <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
	          No rules.
	        </td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	        <td class="p-4 text-gray-700 whitespace-nowrap"></td>
	    </tr>
    </tbody>
  </table>
  <div>
  <div class="m-5">
  	<a href="<?php echo Uri::base(); ?>add_rule/" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        Add Rule
    </a>
   </div>
  </div>
</div>
