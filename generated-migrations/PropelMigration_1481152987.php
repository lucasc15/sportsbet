<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1481152987.
 * Generated on 2016-12-07 18:23:07 by lucas
 */
class PropelMigration_1481152987
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'sportsbet' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `dates`;

ALTER TABLE `events`

  ADD `sportID` INTEGER NOT NULL AFTER `eventID`,

  ADD `date` DATE NOT NULL AFTER `title`;

CREATE INDEX `events_fi_292d25` ON `events` (`sportID`);

ALTER TABLE `events` ADD CONSTRAINT `events_fk_292d25`
    FOREIGN KEY (`sportID`)
    REFERENCES `sports` (`sportID`);

ALTER TABLE `options`

  ADD `correct` TINYINT(1) AFTER `voteCount`;

ALTER TABLE `votes`

  CHANGE `userID` `userID` INTEGER,

  ADD `IPAddress` VARCHAR(255) NOT NULL AFTER `voteID`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'sportsbet' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `events` DROP FOREIGN KEY `events_fk_292d25`;

DROP INDEX `events_fi_292d25` ON `events`;

ALTER TABLE `events`

  DROP `sportID`,

  DROP `date`;

ALTER TABLE `options`

  DROP `correct`;

ALTER TABLE `votes`

  CHANGE `userID` `userID` INTEGER NOT NULL,

  DROP `IPAddress`;

CREATE TABLE `dates`
(
    `date` DATE NOT NULL,
    `sportID` INTEGER NOT NULL,
    `eventID` INTEGER NOT NULL,
    INDEX `dates_fi_292d25` (`sportID`),
    INDEX `dates_fi_53757f` (`eventID`),
    CONSTRAINT `dates_fk_292d25`
        FOREIGN KEY (`sportID`)
        REFERENCES `sports` (`sportID`),
    CONSTRAINT `dates_fk_53757f`
        FOREIGN KEY (`eventID`)
        REFERENCES `events` (`eventID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}