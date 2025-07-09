<?php
$config = json_decode(file_get_contents(__DIR__ . '/../config/settings.json'), true);
$config = array_merge(["adsense_top"=>"","adsense_bottom"=>""], $config);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($config['title'] ?? 'MillionBest - Free Online Tools'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($config['description'] ?? ''); ?>">
    <link rel="icon" href="<?php echo htmlspecialchars($config['favicon'] ?? '/uploads/favicon.ico'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <?php echo $config['head'] ?? ''; ?>
</head>
<body class="min-h-screen flex flex-col">
<nav class="bg-white shadow sticky top-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-3">
    <a href="/" class="flex items-center space-x-2">
      <img src="<?php echo htmlspecialchars($config['logo'] ?? '/uploads/logo.png'); ?>" alt="Logo" class="h-8 w-auto">
    </a>
    <div>
      <a href="/" class="text-gray-700 mr-4">Home</a>
      <a href="/admin" class="text-gray-700">Admin</a>
    </div>
  </div>
</nav>
<main class="flex-1 container mx-auto px-4 py-6">
