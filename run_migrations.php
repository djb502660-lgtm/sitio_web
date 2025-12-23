<?php

/**
 * Script para ejecutar migraciones desde el navegador
 * Ejecutar desde: http://localhost/run_migrations.php
 * IMPORTANTE: Eliminar este archivo después de usarlo por seguridad
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;

try {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Ejecutando Migraciones</title>";
    echo "<style>body{font-family:Arial,sans-serif;padding:20px;background:#f5f5f5;}";
    echo ".container{background:white;padding:30px;border-radius:10px;max-width:800px;margin:0 auto;}";
    echo "pre{background:#f8f9fa;padding:15px;border-radius:5px;overflow-x:auto;}";
    echo "a{color:#6366f1;text-decoration:none;font-weight:bold;}";
    echo "a:hover{text-decoration:underline;}</style></head><body>";
    echo "<div class='container'>";
    echo "<h1>🔄 Ejecutando Migraciones...</h1>";
    echo "<pre>";
    
    // Ejecutar migraciones
    $exitCode = Artisan::call('migrate', ['--force' => true]);
    
    $output = Artisan::output();
    echo htmlspecialchars($output);
    
    if ($exitCode === 0) {
        echo "\n✅ <strong>¡Migraciones ejecutadas exitosamente!</strong>\n\n";
        echo "Las tablas han sido creadas en la base de datos.\n\n";
        echo "📋 <strong>Próximos pasos:</strong>\n";
        echo "1. Crear usuario administrador: <a href='/create_admin_user.php'>create_admin_user.php</a>\n";
        echo "2. O registrarte: <a href='/register'>/register</a>\n";
        echo "3. Iniciar sesión: <a href='/login'>/login</a>\n";
        echo "\n⚠️ <strong>IMPORTANTE:</strong> Elimina este archivo (run_migrations.php) después de usarlo.\n";
    } else {
        echo "\n❌ Error al ejecutar migraciones\n";
    }
    
    echo "</pre></div></body></html>";
    
} catch (Exception $e) {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Error</title>";
    echo "<style>body{font-family:Arial,sans-serif;padding:20px;background:#fee;}";
    echo ".container{background:white;padding:30px;border-radius:10px;max-width:800px;margin:0 auto;}</style></head><body>";
    echo "<div class='container'>";
    echo "<h1>❌ Error</h1>";
    echo "<pre>";
    echo "Error: " . htmlspecialchars($e->getMessage()) . "\n";
    echo "\nStack trace:\n" . htmlspecialchars($e->getTraceAsString());
    echo "</pre></div></body></html>";
}

