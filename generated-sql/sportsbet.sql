
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sports
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sports`;

CREATE TABLE `sports`
(
    `sportID` INTEGER NOT NULL AUTO_INCREMENT,
    `sport` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`sportID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- events
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events`
(
    `eventID` INTEGER NOT NULL AUTO_INCREMENT,
    `sportID` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`eventID`),
    INDEX `events_fi_292d25` (`sportID`),
    CONSTRAINT `events_fk_292d25`
        FOREIGN KEY (`sportID`)
        REFERENCES `sports` (`sportID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- options
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options`
(
    `optionID` INTEGER NOT NULL AUTO_INCREMENT,
    `eventID` INTEGER NOT NULL,
    `text` VARCHAR(128) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `voteCount` INTEGER NOT NULL,
    `correct` TINYINT(1),
    PRIMARY KEY (`optionID`),
    INDEX `options_fi_53757f` (`eventID`),
    CONSTRAINT `options_fk_53757f`
        FOREIGN KEY (`eventID`)
        REFERENCES `events` (`eventID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `userID` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `correct` INTEGER NOT NULL,
    `incorrect` INTEGER NOT NULL,
    PRIMARY KEY (`userID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- votes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes`
(
    `voteID` INTEGER NOT NULL AUTO_INCREMENT,
    `IPAddress` VARCHAR(255) NOT NULL,
    `userID` INTEGER,
    `optionID` INTEGER NOT NULL,
    PRIMARY KEY (`voteID`),
    INDEX `votes_fi_135423` (`userID`),
    INDEX `votes_fi_9fb124` (`optionID`),
    CONSTRAINT `votes_fk_135423`
        FOREIGN KEY (`userID`)
        REFERENCES `users` (`userID`),
    CONSTRAINT `votes_fk_9fb124`
        FOREIGN KEY (`optionID`)
        REFERENCES `options` (`optionID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
