<?php include __DIR__.'/../../includes/header.php';
require_once 'Tool.php';
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = $_POST['json'] ?? '';
    $formatted = JsonFormatter::format($json);
    if ($formatted === false) {
        $result = '<div class="alert alert-danger">Invalid JSON</div>';
    } else {
        $result = '<pre class="mt-3">'.htmlspecialchars($formatted).'</pre>';
    }
}
?>
<h1>JSON Formatter</h1>
<form method="post">
    <div class="mb-3">
        <textarea name="json" class="form-control" rows="5" placeholder="Paste JSON here" required><?php echo isset($_POST['json']) ? htmlspecialchars($_POST['json']) : ''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Format JSON</button>
</form>
<?php if ($result): echo $result; endif; ?>
<?php include __DIR__.'/../../includes/footer.php'; ?>
