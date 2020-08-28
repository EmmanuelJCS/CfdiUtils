<?php

namespace CfdiUtilsTests\Elements\Nomina12;

use CfdiUtils\Elements\Nomina12\Receptor;
use CfdiUtils\Elements\Nomina12\SubContratacion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \CfdiUtils\Elements\Nomina12\Receptor
 */
class ReceptorTest extends TestCase
{
    /** @var Receptor */
    public $element;

    protected function setUp()
    {
        parent::setUp();
        $this->element = new Receptor();
    }

    public function testConstructedObject()
    {
        $this->assertSame('nomina12:Receptor', $this->element->getElementName());
    }

    public function testAddSubContratacion()
    {
        // insert first element
        $first = $this->element->addSubContratacion(['id' => 'first']);
        $this->assertInstanceOf(SubContratacion::class, $first);
        $this->assertSame('first', $first['id']);
        $this->assertCount(1, $this->element);

        // insert second element data should return a different element
        $second = $this->element->addSubContratacion(['id' => 'second']);
        $this->assertNotEquals($first, $second);
        $this->assertCount(2, $this->element);
    }

    public function testMultiSubContratacion()
    {
        // insert first element
        $receptor = $this->element->multiSubContratacion(
            ['id' => 'first'],
            ['id' => 'second']
        );
        $this->assertCount(2, $receptor);
        $this->assertSame($this->element, $receptor);
    }
}
