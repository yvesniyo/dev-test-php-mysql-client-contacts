CREATE TABLE
    `clients` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(30) NOT NULL,
        `client_code` VARCHAR(6) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`client_code`)
    );

CREATE TABLE
    `contacts` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(30) NOT NULL,
        `surname` VARCHAR(20) NOT NULL,
        `email` VARCHAR(30) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`email`)
    );

CREATE TABLE
    `contact_clients` (
        `contact_id` INT NOT NULL,
        `client_id` INT NOT NULL
    );

ALTER TABLE `contact_clients`
ADD
    FOREIGN KEY (`contact_id`) REFERENCES `contacts`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `contact_clients`
ADD
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;