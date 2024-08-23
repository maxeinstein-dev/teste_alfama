-- Criando tabela usuários
CREATE TABLE `usuarios` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `telephone` varchar(20) DEFAULT NULL,
    `cpf` varchar(14) DEFAULT NULL,
    `profession` varchar(100) DEFAULT NULL,
    `address` varchar(100) DEFAULT NULL,
    `profile_image` varchar(10000) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`),
    UNIQUE KEY `cpf_UNIQUE` (`cpf`)
);
