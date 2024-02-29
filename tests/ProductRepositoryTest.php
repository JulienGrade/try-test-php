<?php

use App\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{

    public function testProductsAreReturned(): void
    {
        $productRepoMock = $this->createMock(\App\ProductRepository::class);

        $mockProductsArray = [
            ['id' => 1, 'name' => 'Acme Radio Knobs'],
            ['id' => 2, 'name' => 'Apple iPhone'],
        ];

        $productRepoMock->method('fetchProducts')
            ->willReturn($mockProductsArray);

        $this->assertCount(2, $productRepoMock->fetchProducts());
    }

    public function testGetPdoReturnsPdoInstance(): void
    {
        // Crée une instance de la classe de test enfant
        $repository = new ProductRepositoryTestChild();

        // Appelle la méthode getPdo (qui est protégée)
        $pdo = $repository->callGetPdo();

        // Vérifie que la valeur retournée est une instance de \PDO
        $this->assertInstanceOf(\PDO::class, $pdo);

        // Vérifie que la connexion à la base de données est établie
        $this->assertTrue($pdo->getAttribute(\PDO::ATTR_CONNECTION_STATUS) !== null);
    }
}

class ProductRepositoryTestChild extends ProductRepository
{
    // Méthode publique pour appeler la méthode protégée getPdo
    public function callGetPdo(): \PDO
    {
        return $this->getPdo();
    }
}
