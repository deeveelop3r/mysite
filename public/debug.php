<?php
// Debug info untuk Railway deployment

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head><title>MyPortfolio - Debug</title>";
echo "<style>body { font-family: Arial; margin: 20px; background: #1a1a1a; color: #fff; }</style>";
echo "</head>";
echo "<body>";

echo "<h1>🔍 MyPortfolio Debug Info</h1>";

echo "<h2>Environment:</h2>";
echo "<pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "OS: " . php_uname() . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Current Dir: " . getcwd() . "\n";
echo "</pre>";

echo "<h2>Database:</h2>";
echo "<pre>";
$db_path = getenv('DB_DATABASE');
echo "DB_CONNECTION: " . getenv('DB_CONNECTION') . "\n";
echo "DB_DATABASE: " . $db_path . "\n";
echo "Database exists: " . (file_exists($db_path) ? "✅ YES" : "❌ NO") . "\n";
if (file_exists($db_path)) {
    echo "Database size: " . filesize($db_path) . " bytes\n";
}
echo "</pre>";

echo "<h2>Files in project root:</h2>";
echo "<pre>";
$files = glob('/app/*', GLOB_ONLYDIR);
foreach ($files as $file) {
    echo basename($file) . "/\n";
}
echo "</pre>";

echo "<h2>Database file location checks:</h2>";
echo "<pre>";
$paths = [
    '/app/database/portfolio.sqlite',
    './database/portfolio.sqlite',
    '../database/portfolio.sqlite',
    getenv('DB_DATABASE'),
];
foreach ($paths as $path) {
    $exists = file_exists($path) ? "✅" : "❌";
    echo "$exists $path\n";
}
echo "</pre>";

echo "<h2>Laravel status:</h2>";
echo "<pre>";
try {
    require '/app/bootstrap/app.php';
    echo "✅ Laravel app bootstrapped\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
echo "</pre>";

echo "</body>";
echo "</html>";
?>
