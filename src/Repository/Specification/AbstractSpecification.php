<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 11:05
 */
namespace SpeciticationTest\Repository\Specification;

use Doctrine\DBAL\Query\Expression\CompositeExpression;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;


/**
 * Class AbstractSpecification
 * @package SpeciticationTest\Repository
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
abstract class AbstractSpecification implements Specification
{
    /**
     * @param $object
     * @return bool
     */
    abstract public function isSatisfiedBy($object) : bool;

    /**
     * @param ExpressionBuilder $expressionBuilder
     * @return CompositeExpression
     */
    abstract public function toExpression(ExpressionBuilder $expressionBuilder) : CompositeExpression;

    /**
     * @param Specification $other
     * @return Specification
     */
    public function and(Specification $other) : AbstractSpecification
    {
        return new AndSpecification($this, $other);
    }
}
