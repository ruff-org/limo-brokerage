<?php if(isset($page) && isset($content) && isset($header) && isset($footer)): ?>
    <section id="blz-app">
        <?php echo $header; ?>
        <main>
            <div>
                <?php echo $content; ?>
            </div>
        </main>
        <?php echo $footer; ?>
    </section>
<?php endif; ?>