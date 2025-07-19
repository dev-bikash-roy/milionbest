<?php
$idea = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idea = $_POST['idea'] ?? '';
    $ai = new App\RouterAI($settings['router_ai_api_key']);
    $result = $ai->generate("Create a short movie script about: " . $idea);
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">Movie Script Writer</h1>
<form method="post" class="mb-4">
    <textarea name="idea" class="w-full p-2 border" rows="4" placeholder="Enter your movie idea" required><?php echo htmlspecialchars($idea); ?></textarea>
    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Generate</button>
</form>
<?php if($result): ?>
<div class="bg-white p-4 rounded shadow"><pre class="whitespace-pre-wrap"><?php echo htmlspecialchars($result); ?></pre></div>
<?php endif; ?>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
