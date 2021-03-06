<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Field;

use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\FieldSerializer\UpdatedAtFieldSerializer;

class UpdatedAtField extends DateTimeField
{
    public function __construct()
    {
        parent::__construct('updated_at', 'updatedAt');
        $this->addFlags(new Required());
    }

    protected function getSerializerClass(): string
    {
        return UpdatedAtFieldSerializer::class;
    }
}
