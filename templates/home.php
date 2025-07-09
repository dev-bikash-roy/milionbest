<?php
$tools = json_decode(file_get_contents(__DIR__.'/../config/tools.json'), true);
include __DIR__.'/header.php';
?>
<div class="text-center py-10 bg-gradient-to-r from-[#0061ff] to-[#60efff] text-white rounded">
    <h1 class="text-4xl font-bold mb-2">The Best Free Tools in One Place</h1>
    <p class="mb-4">Merge PDFs, Write Resumes, Format JSON, Compress Images and more — no sign-up required.</p>
    <a href="#tools" class="px-4 py-2 bg-white text-black rounded">Explore All Tools</a>
</div>
<div id="tools" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
<?php foreach($tools as $tool): if(!$tool['visible']) continue; ?>
    <div class="border p-4 rounded shadow">
        <div class="text-xl mb-2"><?php echo $tool['icon']; ?> <?php echo htmlspecialchars($tool['name']); ?></div>
        <a href="/<?php echo $tool['slug']; ?>" class="px-3 py-1 bg-blue-500 text-white rounded">Open</a>
    </div>
<?php endforeach; ?>
</div>
<?php include __DIR__.'/footer.php'; ?>
