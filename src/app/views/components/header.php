<?php if(isset($menu) && isset($page) && isset($auth)): ?>

    <header>
        <nav class="flex items-center bg-gray-800 p-3 flex-wrap">
            <a href="<?php echo Uri::base(); ?>" class="p-2 mr-4 inline-flex items-center group">
            	<i class="text-white hover:text-gray-100">
                <svg width="40" height="40" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.879 13.015a.5.5 0 01.242 0l6 1.5a.5.5 0 01.037.96l-6 2a.499.499 0 01-.316 0l-6-2a.5.5 0 01.037-.96l6-1.5z" clip-rule="evenodd"/>
					<path d="M13.885 14.538l-.72-2.877c-.862.212-1.964.339-3.165.339s-2.303-.127-3.165-.339l-.72 2.877c-.073.292-.002.6.256.756.49.295 1.545.706 3.629.706s3.14-.411 3.63-.706c.257-.155.328-.464.255-.756zM11.97 6.88l.953 3.811C12.159 10.878 11.14 11 10 11c-1.14 0-2.159-.122-2.923-.309L8.03 6.88C8.635 6.957 9.3 7 10 7s1.365-.043 1.97-.12zm-.245-.978L10.97 2.88c-.252-1.01-1.688-1.01-1.94 0L8.275 5.9C8.8 5.965 9.382 6 10 6c.618 0 1.2-.036 1.725-.098z"/>
				</svg>
				</i>
                <span class="text-xl text-white group-hover:text-gray-300 font-bold tracking-wide">
                    <?php echo Layout_Site::nav_title; ?>
                </span>
            </a>
            <button data-target="#blz-menu-mobile" class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler">
                <!-- Burger Menu -->
                <i class="material-icons">menu</i>
            </button>
            <div class="lg:hidden md:block sm:block w-full text-center">
	            <div class="hidden top-navbar w-full" id="blz-menu-mobile">
	                <div class="block lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
	                    <?php foreach($menu as $i => $menu_item): ?>
		                    <a href="<?php echo $menu_item['url']; ?>" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white<?php if($page === ($i+1)): ?>  underline <?php endif; ?>">
		                        <span>
		                            <?php echo $menu_item['label']; ?>
		                        </span>
		                    </a>
	                    <?php endforeach; ?>
	                </div>
	            </div>
            </div>
            <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="blz-menu">
                <div class="hidden lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
                    <?php foreach($menu as $i => $menu_item): ?>
	                    <a href="<?php echo $menu_item['url']; ?>" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white<?php if($page === ($i+1)): ?>  underline <?php endif; ?>">
	                        <span>
	                            <?php echo $menu_item['label']; ?>
	                        </span>
	                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </nav>
        <div class="flex bg-blue-700 p-2 w-full flex-wrap">
        	<?php if($auth->isLoggedIn()): ?>
        		<div class="inline-flex justify-start">
        			<span class="text-blue-200">
        				Logged in as:
        			</span>
    				<a class="text-blue-100 hover:text-white hover:underline ml-2" href="<?php echo Uri::base(); ?>profile/<?php echo $auth->getUserId(); ?>/">
    					<?php echo $auth->getUsername(); ?>
    				</a>
        		</div>
        		<div class="inline-flex justify-end ml-auto">
        			<a class="text-blue-100 hover:text-white hover:underline" href="<?php echo Uri::base(); ?>account/">
        				Account
        			</a>
        			<a class="text-blue-100 hover:text-white ml-5 hover:underline" href="<?php echo Uri::base(); ?>logout/">
        				Logout
        			</a>
        		</div>
        	  <?php else: ?>
        		<div class="inline-flex justify-start">
        			<span class="text-blue-200">
        				Not logged in.
        			</span>
        		</div>
        		<div class="inline-flex justify-end ml-auto">
        			<a class="text-blue-100 hover:text-white hover:underline" href="<?php echo Uri::base(); ?>login/">
        				Login
        			</a>
        			<a class="text-blue-100 hover:text-white ml-5 hover:underline" href="<?php echo Uri::base(); ?>register/">
        				Register
        			</a>
        		</div>
        	  <?php endif; ?>
        	</div>
        </div>
    </header>

<?php endif; ?>