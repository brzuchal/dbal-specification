<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 02.09.16
 * Time: 10:44
 */
namespace SpeciticationTest\Repository\Specification;

use Doctrine\DBAL\Query\Expression\CompositeExpression;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

/**
 * Interface Specification
 * @package SpeciticationTest\Repository\Specification
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
interface Specification
{
    public function isSatisfiedBy($object) : bool;
    public function toExpression(ExpressionBuilder $expressionBuilder) : CompositeExpression;
}
