<section class="max-w-4xl p-6 mx-auto bg-white">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">
    	Add Driver
    </h2>
    
    <form method="post" action="<?php echo Uri::base(); ?>submit/driver" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="driver-name">
                	Driver's Name
                </label>
                <input id="driver-name" type="text" name="driver-name" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="vehicle-info">
                	Vehicle Make/Model
                </label>
                <input id="vehicle-info" name="vehicle-info" required type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="vehicle-image">
                	Vehicle Image	
                </label>
                <input id="vehicle-image" name="vehicle-image" required type="file" accept="image/png, image/jpeg, image/jpg" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="vehicle-color">
                	Vehicle Color
                </label>
                <input id="vehicle-color" type="text" required name="vehicle-color" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
            </div>
            
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="pass-limit">
                	Passenger Limit
                </label>
                <input id="pass-limit" type="number" required name="pass-limit" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
            </div>
            
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="service-type">
                	Service Type
                </label>
                <select id="service-type" name="service-type" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                	<option value="car">
                		Car Service
                	</option>
                	<option value="limo">
                		Limo Service
                	</option>
                	<option value="shuttle">
                		Shuttle Service
                	</option>
                	<option value="bus">
                		Bus Service
                	</option>
                </select>
            </div>
        </div>

        <div class="flex justify-start mt-6">
            <input type="submit" value="Add" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"/>
        </div>
    </form>
</section>