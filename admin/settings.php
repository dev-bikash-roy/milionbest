<?php
session_start();
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$configPath = __DIR__.'/../config/settings.json';
$config = json_decode(file_get_contents($configPath), true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config['title'] = $_POST['title'];
    $config['description'] = $_POST['description'];
    $config['adsense_bottom'] = $_POST['adsense_bottom'];
    file_put_contents($configPath, json_encode($config, JSON_PRETTY_PRINT));
    header('Location: dashboard.php');
    exit;
}
include __DIR__.'/../templates/header.php';
?>
<h2 class="text-xl font-bold mb-4">Settings</h2>
<form method="post" class="max-w-lg">
  <label class="block mb-2">Site Title
    <input type="text" name="title" class="border p-2 w-full" value="<?php echo htmlspecialchars($config['title']); ?>">
  </label>
  <label class="block mb-2">Meta Description
    <textarea name="description" class="border p-2 w-full" rows="3"><?php echo htmlspecialchars($config['description']); ?></textarea>
  </label>
  <label class="block mb-2">Adsense Code
    <textarea name="adsense_bottom" class="border p-2 w-full" rows="3"><?php echo htmlspecialchars($config['adsense_bottom']); ?></textarea>
  </label>
  <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
</form>
<?php include __DIR__.'/../templates/footer.php'; ?>
