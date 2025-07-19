<?php
$subject = '';
$details = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'] ?? '';
    $details = $_POST['details'] ?? '';
    $ai = new App\RouterAI($settings['router_ai_api_key']);
    $prompt = "Write a professional email about: $subject. Details: $details";
    $result = $ai->generate($prompt);
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">Email Writer</h1>
<form method="post" class="mb-4 space-y-2">
    <input type="text" name="subject" class="w-full p-2 border" placeholder="Subject" value="<?php echo htmlspecialchars($subject); ?>" required>
    <textarea name="details" class="w-full p-2 border" rows="4" placeholder="Additional details" required><?php echo htmlspecialchars($details); ?></textarea>
    <button class="px-4 py-2 bg-blue-500 text-white rounded">Generate</button>
</form>
<?php if($result): ?>
<div class="bg-white p-4 rounded shadow"><pre class="whitespace-pre-wrap"><?php echo htmlspecialchars($result); ?></pre></div>
<?php endif; ?>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
