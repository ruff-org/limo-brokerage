<?php if(isset($menu) && isset($page) && isset($auth)): ?>

    <header>
        <nav class="flex items-center bg-gray-800 p-3 flex-wrap">
            <a href="<?php echo Uri::base(); ?>" class="p-2 mr-4 inline-flex items-center group">
                <img class="group-hover:opacity-75" src="<?php echo Layout_Site::image(); ?>" width="40" height="40" alt="<?php echo Layout_Site::motto; ?>" />
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