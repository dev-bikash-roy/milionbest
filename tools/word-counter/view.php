<?php include __DIR__.'/../../includes/header.php';
require_once 'Tool.php';
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'] ?? '';
    $result = WordCounter::countWords($text);
}
?>
<h1>Word Counter</h1>
<form method="post">
    <div class="mb-3">
        <textarea name="text" class="form-control" rows="5" placeholder="Enter text here" required><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Count Words</button>
</form>
<?php if ($result !== null): ?>
<div class="alert alert-success mt-3">Word Count: <?php echo $result; ?></div>
<?php endif; ?>
<?php include __DIR__.'/../../includes/footer.php'; ?>
