<!--
	@ Source https://tailwindcomponents.com/component/form-register
-->
<style>
  .btn-icon{
  	margin-top:2px;
  }
  .btn-label{
  	margin-top:-2px;
  }
  input:checked + svg {
  	display: block;
  }
  body{overflow-y:hidden;}
  .content-body{
  	overflow-y:scroll;
  }
  @media screen and (max-width: 800px){
  	.login-box{
  		margin-top:30px;	
  	}
  }
  @media screen and (max-width: 371px){
  	.login-box{
  		margin-top:20px;
  	}
  }
  
  @media screen and (min-width: 1024px){
  	.login-box{
  		margin-top:35px;
  	}
  	.home-btn{
  		margin-top:5px;
  	}
  }
</style>
<div class="h-screen bg-gradient-to-br from-blue-700 to-blue-600 flex justify-center items-center w-full content-body">
  <form method="post" action="<?php echo Uri::base(); ?>auth/register">
  	<br /> <br /> <br />
    <div class="bg-white px-10 lg:my-10 lg:rounded-xl lg:w-screen shadow-md lg:max-w-sm sm:w-full login-box">
      <div class="space-y-4">
      	<div class="text-center pt-8">
	  		<a href="<?php echo Uri::base(); ?>" class="py-1.5 px-4 md:mt-5 lg:mt-0 inline-flex items-center text-center space-x-2 transition-colors bg-gray-600 border active:bg-gray-800 font-medium border-gray-700 text-white rounded-lg hover:bg-gray-700 disabled:opacity-50 home-btn">
				<svg class="fill-current text-white mr-2" width="25" height="25" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 12.995V16.5a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4a.5.5 0 01-.5-.5V13c0-.25-.25-.5-.5-.5H9c-.25 0-.5.25-.5.495z"/>
					<path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
				</svg>
				<span class="mt-1 ml-auto">
					Return Home
				</span>
			</a>
      	</div>
      	<hr />
        <h1 class="text-center text-2xl font-semibold text-gray-600 md:pt-5 sm:mt-5 sm:pt-10 md:pt-0">
        	Register
        </h1>
        <div>
          <label for="field-username" class="block mb-1 text-gray-600 font-semibold">Username</label>
          <input type="text" id="field-username" name="field-username" class="bg-indigo-50 hover:bg-indigo-100 focus:bg-indigo-200 px-4 py-2 outline-none rounded-md w-full" required />
        </div>
        <div>
          <label for="field-email" class="block mb-1 text-gray-600 font-semibold">Email</label>
          <input type="email" id="field-email" name="field-email" class="bg-indigo-50 hover:bg-indigo-100 focus:bg-indigo-200 px-4 py-2 outline-none rounded-md w-full" required />
        </div>
        <div>
          <label for="field-password" class="block mb-1 text-gray-600 font-semibold">Password</label>
          <input type="password" id="field-password" name="field-password" class="bg-indigo-50 hover:bg-indigo-100 focus:bg-indigo-200 px-4 py-2 outline-none rounded-md w-full" required />
        </div>
        <div>
          <label for="field-password-repeat" class="block mb-1 text-gray-600 font-semibold">Repeat Password</label>
          <input type="password" id="field-password-repeat" name="field-password-repeat" class="bg-indigo-50 hover:bg-indigo-100 focus:bg-indigo-200 px-4 py-2 outline-none rounded-md w-full" required />
        </div>
        <div class="text-sm">
        	<label for="legal" class="flex justify-start mt-3 mb-3 group">
                <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 group-hover:border-blue-500 focus-within:bg-gray-100">
    				<input type="checkbox" id="legal" name="legal" value="1" class="opacity-0 absolute" required>
    				<svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
				</div>
                <span class="ml-1 text-gray-700 font-bold">I agree to the <a target="terms" class="text-blue-800 hover:underline" href="https://blazed.sbs/assets/pdf/tos.pdf">Terms</a> and <a class="text-blue-800 hover:underline" target="privacy" href="https://www.blazedlabs.com/privacy/">Privacy Policy</a></span>
            </label>
        </div>
      </div>
      <input type="submit" value="Register" class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 hover:from-indigo-800 text-indigo-100 hover:text-white py-2 rounded-md text-lg tracking-wide">
      <br /><br />
    </div>
  </form>
</div>