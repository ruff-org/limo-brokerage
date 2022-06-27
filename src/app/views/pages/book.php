<!--
/*
	- Customer Name
	- Customer Email
	- Pickup Date
	- Pickup Time
	- Pickup Info
*/
-->
 <section class="max-w-4xl p-6 mx-auto bg-white">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">
    		Book Trip
    	</h2>
        
        <form method="post" action="<?php Uri::base(); ?>api/post/book">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="client-name">
                    	Your Name
                    </label>
                    <input id="client-name" name="client-name" type="text" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="client-email">
                    	Email Address
                    </label>
                    <input id="client-email" name="client-email" type="email" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="pickup-date">
                    	Pickup Date	
                    </label>
                    <input id="pickup-date" type="date" name="pickup-date" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="pickup-time">
                    	Pickup Time
                    </label>
                    <input id="pickup-time" name="pickup-time" type="time" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>
                
                <div class="relative">
                	<span class="absolute inset-y-0 left-0 top-8 flex items-center pl-3">
	                    <svg class="w-5 h-5 text-gray-400" width="30" height="30" viewBox="0 0 20 20" fill="#4d4d4d" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path d="M9.5 6h1v9a.5.5 0 01-1 0V6z"/>
							<path fill-rule="evenodd" d="M8.489 14.095a.5.5 0 01-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.383.655.245 1.593.407 2.653.407s1.998-.162 2.653-.407c.329-.124.56-.259.701-.383.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 11.212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.337-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 01.595.383z" clip-rule="evenodd"/>
						</svg>
                	</span>
                    <label class="text-gray-700 dark:text-gray-200" for="pickup-address">
                    	Pickup Address	
                    </label>
                    <input id="pickup-address" name="pickup-address" onFocus="geolocate()" type="text" autocomplete="new-password" required class="block w-full px-4 py-2 pl-10 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>

                <div class="relative">
                	<span class="absolute inset-y-0 left-0 top-8 flex items-center pl-3">
	                    <svg class="w-5 h-5 text-gray-400" width="30" height="30" viewBox="0 0 20 20" fill="#4d4d4d" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path d="M9.5 6h1v9a.5.5 0 01-1 0V6z"/>
							<path fill-rule="evenodd" d="M8.489 14.095a.5.5 0 01-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.383.655.245 1.593.407 2.653.407s1.998-.162 2.653-.407c.329-.124.56-.259.701-.383.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 11.212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.337-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 01.595.383z" clip-rule="evenodd"/>
						</svg>
                	</span>
                    <label class="text-gray-700 dark:text-gray-200" for="dropoff-address">
                    	Dropoff Address
                    </label>
                    <input id="dropoff-address" name="dropoff-address" onFocus="geolocate()" autocomplete="new-password" type="text" required class="block w-full px-4 py-2 pl-10 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none">
                </div>
            </div>

            <div class="flex justify-start mt-6">
                <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                	Book
                </button>
            </div>
        </form>
    </section>