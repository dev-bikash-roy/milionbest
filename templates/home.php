<?php view(__DIR__ . '/header.php', compact('settings')); ?>
<h1 class="text-2xl font-bold mb-4">Available Tools</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<?php foreach ($tools as $tool): if(!$tool['visible']) continue; ?>
    <div class="bg-white p-4 rounded shadow">
        <div class="text-xl mb-2"><?php echo $tool['icon']; ?> <?php echo htmlspecialchars($tool['name']); ?></div>
        <a class="text-blue-600" href="/?tool=<?php echo $tool['slug']; ?>">Open</a>
    </div>
<?php endforeach; ?>
</div>
<?php view(__DIR__ . '/footer.php'); ?>
