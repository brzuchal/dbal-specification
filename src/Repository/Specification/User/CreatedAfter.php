<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 11:16
 */
namespace SpeciticationTest\Repository\Specification\User;

use DateTime;
use Doctrine\DBAL\Query\Expression\CompositeExpression;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;
use SpeciticationTest\Repository\Specification\AbstractSpecification;

/**
 * Class CreatedAfter
 * @package SpeciticationTest\Repository\Specification\User
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class CreatedAfter extends AbstractSpecification
{
    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * CreatedAfter constructor.
     * @param DateTime $dateTime
     */
    public function __construct(DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @param $object
     * @return bool
     */
    public function isSatisfiedBy($object) : bool
    {
        // TODO: Implement isSatisfiedBy() method.
    }

    /**
     * @param ExpressionBuilder $expressionBuilder
     * @return CompositeExpression
     */
    public function toExpression(ExpressionBuilder $expressionBuilder) : CompositeExpression
    {
        $expression = $expressionBuilder->gte('created_at', $expressionBuilder->literal($this->dateTime->format('Y-m-d H:i:s')));
        
        return $expressionBuilder->andX($expression);
    }
}
