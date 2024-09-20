<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Component\EasyAdminBundle\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use Symfony\Contracts\Translation\TranslatableInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

/**
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
final class Select2EntityField implements FieldInterface
{
    use FieldTrait;

    /**
     * @param TranslatableInterface|string|false|null $label
     */
    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplateName('crud/field/array')
            ->setTemplatePath('@BaseAdmin/bundles/EasyAdminBundle/crud/field/select2entity.html.twig')
            ->setFormType(Select2EntityType::class)
            ->addCssClass('field-select-2-entity')
            ->setDefaultColumns('col-md-7 col-xxl-6');
    }
}
