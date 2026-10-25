<?php

namespace Drupal\wmcustom_entity_form\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;

/**
 * Attribute counterpart of the EntityForm annotation (Drupal 10.2+).
 *
 * Like the annotation, the plugin ID is "<entity_type>.<bundle>.<operation>"
 * when the entity type and bundle are given.
 *
 * @see \Drupal\wmcustom_entity_form\Annotation\EntityForm
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class EntityForm extends Plugin
{
    /** @var string|null */
    public $entity_type;
    /** @var string|null */
    public $bundle;
    /** @var string */
    public $operation;

    public function __construct(
        ?string $id = null,
        ?string $entity_type = null,
        ?string $bundle = null,
        string $operation = 'default',
        ?string $deriver = null
    ) {
        if (isset($entity_type, $bundle)) {
            $id = implode('.', [$entity_type, $bundle, $operation]);
        }

        parent::__construct($id, $deriver);
        $this->entity_type = $entity_type;
        $this->bundle = $bundle;
        $this->operation = $operation;
    }
}
