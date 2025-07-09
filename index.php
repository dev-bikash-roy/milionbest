<?php include __DIR__.'/includes/header.php';
$tools = json_decode(file_get_contents(__DIR__.'/tools.json'), true);
?>
<div class="text-center py-5 bg-light mb-4">
    <h1>The Best Free Tools in One Place</h1>
    <p class="lead">Merge PDFs, Write Resumes, Format JSON, Compress Images and more — no sign-up required.</p>
    <a href="#tools" class="btn btn-primary">Explore All Tools</a>
</div>
<div id="tools" class="row">
<?php foreach ($tools as $tool): if(!$tool['visible']) continue; ?>
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($tool['name']); ?></h5>
                <a href="/tools/<?php echo $tool['slug']; ?>/view.php" class="btn btn-outline-primary">Open</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php include __DIR__.'/includes/footer.php'; ?>
