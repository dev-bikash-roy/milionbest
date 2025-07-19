<?php view(__DIR__ . '/header.php', compact('settings')); ?>
<?php $currentCategory = $_GET['category'] ?? 'All Tools'; ?>
<h1 class="text-2xl font-bold mb-4">Available Tools</h1>

<nav class="mb-4">
    <ul class="flex flex-wrap gap-2 text-sm">
        <?php foreach ($categories as $cat): ?>
            <li>
                <a class="<?php echo $currentCategory === $cat ? 'font-bold underline' : 'text-blue-600'; ?>" href="/?category=<?php echo urlencode($cat); ?>">
                    <?php echo htmlspecialchars($cat); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<?php foreach ($tools as $tool):
    if(!$tool['visible']) continue;
    if($currentCategory !== 'All Tools' && (($tool['category'] ?? '') !== $currentCategory)) continue; ?>
    <div class="bg-white p-4 rounded shadow">
        <div class="text-xl mb-2"><?php echo $tool['icon']; ?> <?php echo htmlspecialchars($tool['name']); ?></div>
        <a class="text-blue-600" href="/?tool=<?php echo $tool['slug']; ?>">Open</a>
    </div>
<?php endforeach; ?>
</div>
<?php view(__DIR__ . '/footer.php'); ?>
