<?php include __DIR__.'/../../includes/header.php';
require_once 'Tool.php';
$data = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'] ?? '';
    if ($text) {
        $imageData = base64_encode(QrGenerator::create($text));
        $data = '<img src="data:image/png;base64,'.$imageData.'" alt="QR Code" class="mt-3"/>';
    }
}
?>
<h1>QR Code Generator</h1>
<form method="post">
  <div class="mb-3">
    <input type="text" name="text" class="form-control" placeholder="Text or URL" value="<?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Generate</button>
</form>
<?php echo $data; ?>
<?php include __DIR__.'/../../includes/footer.php'; ?>
