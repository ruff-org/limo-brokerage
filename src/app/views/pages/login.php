<style>
  input:checked + svg {
  	display: block;
  }
</style>
<div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://blazed.sirv.com/logo/CityNight-Beaker.png?w=1470&h=1000)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-4xl font-bold text-white">
                        	Blazed Labs
                        </h2>
                        
                        <p class="max-w-xl mt-3 text-gray-300">
                        	We turn Dreams into Reality.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">
                        	Login	
                        </h2>
                        
                        <p class="mt-3 text-gray-500 dark:text-gray-300">
                        	Sign in to access your account.
                        	</p>
                    </div>

                    <div class="mt-8">
                        <form method="post" action="<?php echo Uri::base(); ?>api/post/login">
                            <div>
                                <label for="field-email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                                <input type="email" name="field-email" id="field-email" placeholder="example@example.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white focus:bg-gray-100 border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none" required />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="field-password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                    <a href="<?php echo Uri::base(); ?>forgot/" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                                </div>

                                <input type="password" name="field-password" id="field-password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white focus:bg-gray-100 border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:outline-none" required />
                            </div>
                            
                            <div class="text-sm mt-4">
					        	<label for="remember" class="flex justify-start mt-3 mb-3 group">
					                <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 group-hover:border-blue-500 focus-within:bg-gray-100">
					    				<input type="checkbox" id="remember" name="field-remember" value="1" class="opacity-0 absolute">
					    				<svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
									</div>
					                <span class="ml-1 text-gray-700 font-bold">Keep me logged in</span>
					            </label>
					        </div>

                            <div class="mt-6">
                                <input type="submit" value="Login" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="<?php echo Uri::base(); ?>register/" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>