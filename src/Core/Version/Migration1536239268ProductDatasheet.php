<?php declare(strict_types=1);

namespace Shopware\Core\Version;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1536239268ProductDatasheet extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1536239268;
    }

    public function update(Connection $connection): void
    {
        $connection->executeQuery('
            CREATE TABLE `product_datasheet` (
              `product_tenant_id` binary(16) NOT NULL,
              `product_id` binary(16) NOT NULL,
              `product_version_id` binary(16) NOT NULL,
              `configuration_group_option_id` binary(16) NOT NULL,
              `configuration_group_option_version_id` binary(16) NOT NULL,
              `configuration_group_option_tenant_id` binary(16) NOT NULL,
              PRIMARY KEY (`product_id`, `product_version_id`, `product_tenant_id`, `configuration_group_option_id`, `configuration_group_option_version_id`, `configuration_group_option_tenant_id`),
              CONSTRAINT `fk_product_datasheet.product_id` FOREIGN KEY (`product_id`, `product_version_id`, `product_tenant_id`) REFERENCES `product` (`id`, `version_id`, `tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
              CONSTRAINT `fk_product_datasheet.configuration_option_id` FOREIGN KEY (`configuration_group_option_id`, `configuration_group_option_version_id`, `configuration_group_option_tenant_id`) REFERENCES `configuration_group_option` (`id`, `version_id`, `tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE
            );
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
