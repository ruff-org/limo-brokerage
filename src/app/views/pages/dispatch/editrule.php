<?php if(isset($page_data['rule'])): ?>
	<section class="max-w-4xl p-6 mx-auto bg-white">
	    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">
	    	Edit Rule
	    </h2>
	    
	    <form method="post" action="<?php echo Uri::base(); ?>submit/editrule">
	        <div>
	        	
	            <div class="my-5">
	                <label class="text-gray-700 dark:text-gray-200" for="rule-title">
	                	Title
	                </label>
	                <input id="rule-title" type="text" name="rule-title" value="<?php echo $page_data['rule']['title']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
	            </div>
	
	            <div class="my-5">
	                <label class="text-gray-700 dark:text-gray-200" for="rule-desc">
	                	Description
	                </label>
	                <textarea id="rule-desc" name="rule-desc" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
	                	<?php echo $page_data['rule']['description']; ?>
	                </textarea>
	            </div>
	      
			</div>
			<div>
				<input type="hidden" name="rule-id" value="<?php echo $page_data['rule']['id']; ?>" />
			</div>
	        <div class="flex justify-start mt-6">
	            <input type="submit" value="Update" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"/>
	        </div>
	    </form>
	</section>
<?php endif; ?>