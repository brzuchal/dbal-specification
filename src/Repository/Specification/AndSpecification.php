<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 11:07
 */
namespace SpeciticationTest\Repository\Specification;

use Doctrine\DBAL\Query\Expression\CompositeExpression;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

/**
 * Class AndSpecification
 * @package SpeciticationTest\Repository
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class AndSpecification extends AbstractSpecification
{
    /**
     * @var Specification
     */
    private $first;
    /**
     * @var Specification
     */
    private $second;

    /**
     * AndSpecification constructor.
     * @param Specification $first
     * @param Specification $second
     */
    public function __construct(Specification $first, Specification $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @param $object
     * @return bool
     */
    public function isSatisfiedBy($object) : bool
    {
        return $this->first->isSatisfiedBy($object) && $this->second->isSatisfiedBy($object);
    }

    /**
     * @param ExpressionBuilder $expressionBuilder
     * @return CompositeExpression
     */
    public function toExpression(ExpressionBuilder $expressionBuilder) : CompositeExpression
    {
        return $expressionBuilder
            ->andX($this->first->toExpression($expressionBuilder), $this->second->toExpression($expressionBuilder));
    }
}
