<?php if(isset($page_data['selector']) && isset($page_data['token'])): ?>

	<div class="container mx-auto">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
						style="background-image: url('https://blazed.sirv.com/logo/john-mcmahon-ljjcoULkxL8-unsplash.jpg')"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
						<div class="px-8 mb-4 text-center">
							<h3 class="pt-4 mb-2 text-2xl">
								Reset Your Password
							</h3>
							<p class="mb-6 text-sm text-gray-500">
								Now its time to set a new password.
								Enter it below and your password will be reset.
							</p>
						</div>
						<form method="post" action="<?php echo Uri::base(); ?>auth/reset" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="field-password">
									New Password
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="field-password"
									name="field-password"
									type="password"
									placeholder="Enter a new password"
									required
								/>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="field-password-repeat">
									New Password (Repeat)
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="field-password-repeat"
									name="field-password-repeat"
									type="password"
									required
								/>
							</div>
							<div class="hidden">
								<input type="hidden" name="field-selector" value="<?php echo \urldecode($page_data['selector']); ?>" />
								<input type="hidden" name="field-token" value="<?php echo \urldecode($page_data['token']); ?>" />
							</div>
							<div class="mb-6 text-center">
								<input
									class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
									type="submit" value="Reset Password"
								>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>