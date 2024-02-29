<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Html\Assertions as HtmlAssertions;

class HomepageTest extends TestCase
{
    private string $baseUri;

    protected function setUp(): void
    {
        parent::setUp();

        // Définir l'URL de base de votre application avec "/accueil"
        // Assurez-vous que c'est l'URL de votre serveur Web local
        $this->baseUri = 'http://localhost/cours/php-test/accueil.php';
    }

    public function testHomepageReturns200(): void
    {
        $client = new Client();

        try {
            $response = $client->get($this->baseUri);

            // Vérifiez que le code de statut de la réponse est 200 (OK)
            $this->assertEquals(200, $response->getStatusCode());
        } catch (RequestException $e) {
            // En cas d'erreur, le test échoue
            $this->fail(
                'La page d\'accueil "/accueil" ne renvoie pas une réponse 200 : ' . $e->getMessage()
            );
        }
    }

    public function testH1ContainsAccueil(): void
    {
        // Récupérez le contenu HTML de la page
        $html = file_get_contents($this->baseUri);

        // Utilisez la fonction assertContainsString pour vérifier la présence de <h1> avec le mot "Accueil"
        $this->assertStringContainsString('accueil', $html, 'Le contenu ne contient pas "Accueil".');
    }
}


