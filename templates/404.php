<?php http_response_code(404); view(__DIR__ . '/header.php', compact('settings')); ?>
<h1 class="text-2xl font-bold mb-4">Page Not Found</h1>
<p>Sorry, the page you requested could not be found.</p>
<?php view(__DIR__ . '/footer.php'); ?>
