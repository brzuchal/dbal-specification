<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 10:44
 */
namespace SpeciticationTest\Repository\Specification\User;

use Doctrine\DBAL\Query\Expression\CompositeExpression;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;
use SpeciticationTest\Repository\Specification\AbstractSpecification;

/**
 * Class IsAdmin
 * @package SpeciticationTest\Repository\Specification\User
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class IsAdmin extends AbstractSpecification
{
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
        $expression = $expressionBuilder->eq('role', $expressionBuilder->literal('admin'));
        
        return $expressionBuilder->andX($expression);
    }
}
