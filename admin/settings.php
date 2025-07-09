<?php
session_start();
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$configPath = __DIR__.'/../settings.json';
$config = json_decode(file_get_contents($configPath), true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config['site_title'] = $_POST['site_title'];
    $config['meta_description'] = $_POST['meta_description'];
    $config['adsense_code'] = $_POST['adsense_code'];
    file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT));
    header('Location: dashboard.php');
    exit;
}
?>
<?php include __DIR__.'/../includes/header.php'; ?>
<h2>Settings</h2>
<form method="post">
  <div class="mb-3">
    <label class="form-label">Site Title</label>
    <input type="text" name="site_title" class="form-control" value="<?php echo htmlspecialchars($config['site_title']); ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" class="form-control" rows="3"><?php echo htmlspecialchars($config['meta_description']); ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Adsense Code</label>
    <textarea name="adsense_code" class="form-control" rows="3"><?php echo htmlspecialchars($config['adsense_code']); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php include __DIR__.'/../includes/footer.php'; ?>
