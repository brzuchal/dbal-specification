<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 10:40
 */
namespace SpeciticationTest\Repository;

use Doctrine\DBAL\Connection;
use SpeciticationTest\Repository\Specification\Specification;

/**
 * Class Users
 * @package SpeciticationTest\Repository
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class UserRepository
{
    /**
     * @var Connection
     */
    private $conn;

    /**
     * Users constructor.
     * @param Connection $conn
     */
    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @param Specification $specification
     * @return array
     */
    public function findAllBySpecification(Specification $specification) : array
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $expressionBuilder = $queryBuilder->expr();
        $predicates = $specification->toExpression($expressionBuilder);

        $query = $queryBuilder
            ->select('id', 'login', 'firstname', 'surname', 'role', 'created_at')
            ->from('users')
            ->where($predicates);

        var_dump($query->getSQL());

        return $query
            ->execute()
            ->fetchAll();
    }
}
