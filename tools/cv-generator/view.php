<?php
use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $skills = $_POST['skills'] ?? '';
    $html = "<h1>$name</h1><p>$summary</p><h3>Skills</h3><p>$skills</p>";
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header('Content-Type: application/pdf');
    $dompdf->stream('cv.pdf');
    exit;
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">CV Generator</h1>
<form method="post" class="space-y-2">
    <input type="text" name="name" class="w-full p-2 border" placeholder="Name" required>
    <textarea name="summary" class="w-full p-2 border" rows="3" placeholder="Summary" required></textarea>
    <textarea name="skills" class="w-full p-2 border" rows="3" placeholder="Skills" required></textarea>
    <button class="px-4 py-2 bg-blue-500 text-white rounded">Download PDF</button>
</form>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
