<?php
use Dompdf\Dompdf;

$invoice = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'company' => $_POST['company'] ?? '',
        'customer' => $_POST['customer'] ?? '',
        'details' => $_POST['details'] ?? ''
    ];
    $html = "<h1>{$data['company']}</h1><p>Bill To: {$data['customer']}</p><pre>{$data['details']}</pre>";
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header('Content-Type: application/pdf');
    $dompdf->stream('invoice.pdf');
    exit;
}
view(__DIR__ . '/../../templates/header.php', compact('settings'));
?>
<h1 class="text-2xl font-bold mb-4">Invoice Generator</h1>
<form method="post" class="space-y-2">
    <input type="text" name="company" class="w-full p-2 border" placeholder="Company" required>
    <input type="text" name="customer" class="w-full p-2 border" placeholder="Customer" required>
    <textarea name="details" class="w-full p-2 border" rows="4" placeholder="Details" required></textarea>
    <button class="px-4 py-2 bg-blue-500 text-white rounded">Download PDF</button>
</form>
<?php view(__DIR__ . '/../../templates/footer.php'); ?>
