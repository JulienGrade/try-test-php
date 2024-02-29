<?php
// Récupérez l'URL demandée
$requestUri = $_SERVER['REQUEST_URI'];

// Supprimez les paramètres de requête de l'URL (s'ils existent)
$requestUri = strtok($requestUri, '?');

// Définissez une correspondance pour "/accueil"
if ($requestUri === '/accueil') {
    // Affichez une réponse de réussite
    http_response_code(200);
    echo 'Page d\'accueil';
} else {
    // Si l'URL n'est pas reconnue, renvoyez une erreur 404
    http_response_code(404);
    echo 'Page non trouvée';
}

