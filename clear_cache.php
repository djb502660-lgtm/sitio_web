<?php

/**
 * Script para limpiar caché de Laravel desde el navegador
 * Ejecutar desde: http://localhost/clear_cache.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;

try {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Limpiar Caché</title>";
    echo "<style>body{font-family:Arial,sans-serif;padding:20px;background:#f5f5f5;}";
    echo ".container{background:white;padding:30px;border-radius:10px;max-width:800px;margin:0 auto;}";
    echo "pre{background:#f8f9fa;padding:15px;border-radius:5px;overflow-x:auto;}";
    echo "h1{color:#6366f1;}</style></head><body>";
    echo "<div class='container'>";
    echo "<h1>🧹 Limpiando Caché de Laravel...</h1>";
    echo "<pre>";

    // Limpiar diferentes tipos de caché
    $commands = [
        'config:clear' => 'Caché de configuración',
        'cache:clear' => 'Caché de aplicación',
        'view:clear' => 'Caché de vistas',
        'route:clear' => 'Caché de rutas',
    ];

    foreach ($commands as $command => $description) {
        echo "\n🔄 Limpiando: {$description}...\n";
        $exitCode = Artisan::call($command);
        $output = Artisan::output();
        if ($exitCode === 0) {
            echo "✅ {$description} limpiado exitosamente\n";
        } else {
            echo "⚠️ Error al limpiar {$description}\n";
        }
        if ($output) {
            echo htmlspecialchars($output);
        }
    }

    echo "\n\n✅ <strong>¡Caché limpiado exitosamente!</strong>\n\n";
    echo "Ahora intenta acceder nuevamente a tu aplicación.\n";
    echo "\n⚠️ <strong>IMPORTANTE:</strong> Elimina este archivo (clear_cache.php) después de usarlo.\n";
    
    echo "</pre></div></body></html>";
    
} catch (Exception $e) {
    echo "<h1>❌ Error</h1>";
    echo "<pre>";
    echo "Error: " . htmlspecialchars($e->getMessage()) . "\n";
    echo "\nStack trace:\n" . htmlspecialchars($e->getTraceAsString());
    echo "</pre></body></html>";
}

