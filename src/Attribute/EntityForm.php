<?php

namespace Drupal\wmcustom_entity_form\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;

/**
 * Attribute counterpart of the EntityForm annotation.
 *
 * Like the annotation, the plugin ID is "<entity_type>.<bundle>.<operation>"
 * when the entity type and bundle are given.
 *
 * @see \Drupal\wmcustom_entity_form\Annotation\EntityForm
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class EntityForm extends Plugin
{
    public function __construct(
        ?string $id = null,
        public readonly ?string $entity_type = null,
        public readonly ?string $bundle = null,
        public readonly string $operation = 'default',
        ?string $deriver = null
    ) {
        if (isset($entity_type, $bundle)) {
            $id = implode('.', [$entity_type, $bundle, $operation]);
        }

        parent::__construct($id, $deriver);
    }
}
