<?php

namespace CfdiUtils\Elements\Cfdi40;

use CfdiUtils\Elements\Common\AbstractElement;

class Concepto extends AbstractElement
{
    public function getElementName(): string
    {
        return 'cfdi:Concepto';
    }

    public function getChildrenOrder(): array
    {
        return [
        'cfdi:Impuestos',
        'cfdi:ACuentaTerceros',
        'cfdi:InformacionAduanera',
        'cfdi:CuentaPredial',
        'cfdi:ComplementoConcepto',
        'cfdi:Parte', ];
    }

    public function getImpuestos(): Impuestos
    {
        return $this->helperGetOrAdd(new Impuestos());
    }

    public function addImpuestos(array $attributes = []): Impuestos
    {
        $subject = $this->getImpuestos();
        $subject->addAttributes($attributes);
        return $subject;
    }

    public function getACuentaTerceros(): ACuentaTerceros
    {
        return $this->helperGetOrAdd(new ACuentaTerceros());
    }

    public function addACuentaTerceros(array $attributes = []): ACuentaTerceros
    {
        $subject = $this->getACuentaTerceros();
        $subject->addAttributes($attributes);
        return $subject;
    }

    public function addInformacionAduanera(array $attributes = []): InformacionAduanera
    {
        $subject = new InformacionAduanera($attributes);
        $this->addChild($subject);
        return $subject;
    }

    public function multiInformacionAduanera(array ...$elementAttributes): self
    {
        foreach ($elementAttributes as $attributes) {
            $this->addInformacionAduanera($attributes);
        }
        return $this;
    }

    public function addCuentaPredial(array $attributes = []): CuentaPredial
    {
        $subject = new CuentaPredial($attributes);
        $this->addChild($subject);
        return $subject;
    }

    public function multiCuentaPredial(array ...$elementAttributes): self
    {
        foreach ($elementAttributes as $attributes) {
            $this->addCuentaPredial($attributes);
        }
        return $this;
    }

    public function getComplementoConcepto(): ComplementoConcepto
    {
        return $this->helperGetOrAdd(new ComplementoConcepto());
    }

    public function addComplementoConcepto(array $attributes = []): ComplementoConcepto
    {
        $subject = $this->getComplementoConcepto();
        $subject->addAttributes($attributes);
        return $subject;
    }

    public function addParte(array $attributes = []): Parte
    {
        $subject = new Parte($attributes);
        $this->addChild($subject);
        return $subject;
    }

    public function multiParte(array ...$elementAttributes): self
    {
        foreach ($elementAttributes as $attributes) {
            $this->addParte($attributes);
        }
        return $this;
    }
}
