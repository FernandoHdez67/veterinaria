SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS veterinaria;

USE veterinaria;

DROP TABLE IF EXISTS admin_usuarios;

CREATE TABLE `admin_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS carrucel_models;

CREATE TABLE `carrucel_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS companies;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO companies VALUES("4","Fernando","sarixej838@v3dev.com","Fernando","2023-01-31 07:55:24","2023-01-31 07:55:24");
INSERT INTO companies VALUES("5","Fernando","sarixej838@v3dev.com","Fernando","2023-01-31 07:55:32","2023-01-31 07:55:32");
INSERT INTO companies VALUES("6","Fernando","sarixej838@v3dev.com","Fernando","2023-01-31 07:55:41","2023-01-31 07:55:41");
INSERT INTO companies VALUES("8","Fernando Hernández Sánchez","20200767@uthh.edu.mx","PERSONAL","2023-03-25 03:20:44","2023-03-25 03:20:44");



DROP TABLE IF EXISTS detalles;

CREATE TABLE `detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("7","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("8","2014_10_12_100000_create_password_resets_table","1");
INSERT INTO migrations VALUES("9","2019_08_19_000000_create_failed_jobs_table","1");
INSERT INTO migrations VALUES("10","2019_12_14_000001_create_personal_access_tokens_table","1");
INSERT INTO migrations VALUES("11","2023_01_23_014536_create_model_modulos_table","1");
INSERT INTO migrations VALUES("12","2023_01_23_040937_create_model_cuentas_table","1");
INSERT INTO migrations VALUES("13","2023_01_27_155325_create_product_categories_table","2");
INSERT INTO migrations VALUES("14","2023_01_27_155951_create_products_table","2");
INSERT INTO migrations VALUES("15","2023_01_27_174519_create_productos_table","3");
INSERT INTO migrations VALUES("16","2023_01_27_181133_create_productos_table","4");
INSERT INTO migrations VALUES("17","2023_01_30_060644_create_table_name_table","5");
INSERT INTO migrations VALUES("18","2023_01_30_062506_create_registros_table","6");
INSERT INTO migrations VALUES("19","2023_01_31_061955_create_admin_productos_table","6");
INSERT INTO migrations VALUES("20","2023_02_28_162653_create_admin_usuarios_table","7");
INSERT INTO migrations VALUES("21","2023_03_10_232258_create_detalles_table","7");
INSERT INTO migrations VALUES("22","2023_03_11_072004_create_servicios_models_table","7");
INSERT INTO migrations VALUES("23","2023_03_11_155614_create_carrucel_models_table","7");
INSERT INTO migrations VALUES("24","2023_03_25_030120_create_permission_tables","7");



DROP TABLE IF EXISTS model_cuentas;

CREATE TABLE `model_cuentas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS model_has_permissions;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS model_has_roles;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS model_modulos;

CREATE TABLE `model_modulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS permissions;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS personal_access_tokens;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS registros;

CREATE TABLE `registros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS role_has_permissions;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS servicios_models;

CREATE TABLE `servicios_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS table_name;

CREATE TABLE `table_name` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `column_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS tbl_carrucel;

CREATE TABLE `tbl_carrucel` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idimagen`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_carrucel VALUES("1","imagen1.jpg");
INSERT INTO tbl_carrucel VALUES("2","imagen2.jpg");
INSERT INTO tbl_carrucel VALUES("3","imagen3.jpg");
INSERT INTO tbl_carrucel VALUES("4","imagen4.jpg");



DROP TABLE IF EXISTS tbl_preguntas;

CREATE TABLE `tbl_preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS tbl_productos;

CREATE TABLE `tbl_productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `precio` int(100) DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_productos VALUES("1","Collar","50","30","Collar para perro pequeño","collar.jpg");
INSERT INTO tbl_productos VALUES("2","Vitaminas","250","30","Vitamina para perro","vitamina.jpg");
INSERT INTO tbl_productos VALUES("3","Llavero","200","40","LLavero ideal para que tu mascota no se pierda","llavero.jpg");
INSERT INTO tbl_productos VALUES("4","Shampoo","100","50","Shampoo Dermapet para perro","shampoo.jpg");
INSERT INTO tbl_productos VALUES("5","Jarabe","250","30","Jarabe para la tos y gripa para perro","jarabe.jpg");
INSERT INTO tbl_productos VALUES("6","Antipulgas","100","40","Shampoo antipulgas para perro","antipulgas.jpg");
INSERT INTO tbl_productos VALUES("7","Croquetas","45","0","Croqueta para perro","croqueta.jpg");
INSERT INTO tbl_productos VALUES("33","Repelente 123","56","30","Ideal para que a tu mascota no se le acerque ninguna mosca que pueda causarle una infección","boyo-y-gato.png");
INSERT INTO tbl_productos VALUES("34","Talco Express","190","30","Talco para pulgas, con solo un poco de talco tu mascota no sufrirá mas por esas molestas pulgas","hotel-perros-gatos.png");
INSERT INTO tbl_productos VALUES("53","Casa Dog","100","100","Cada ideal","641f291d5868a.png");
INSERT INTO tbl_productos VALUES("54","Casa Dog","100","100","Cada ideal","producto_641f2945359db2.40237894.png");



DROP TABLE IF EXISTS tbl_roles;

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS tbl_servicios;

CREATE TABLE `tbl_servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(60) NOT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_servicios VALUES("1","Estetica canina","somos un centro especializados en higiene y estética que tienen como finalidad la preservación de la salud de tu mascota. Junto con el personal no sólo nos ocupamos de los cuidados propiamente estéticos, como pueden ser el peinado o el corte de pelo, sino también de realizar una inspección de su salud.","estetica.jpg");
INSERT INTO tbl_servicios VALUES("2","Ultrasonido","El Ultrasonido es un estudio de diagnóstico no invasivo, no doloroso y muy conveniente que ayuda a evaluar el interior del cuerpo de tu mascota. Es una forma de imágenes que nos permite mirar dentro del cuerpo de tu mascota, sin cirugía.","ultrasonido.jpg");
INSERT INTO tbl_servicios VALUES("3","Cirugia","Nos ocupamos del tratamiento quirúrgico de patologías que afectan a órganos internos, piel y musculatura de los animales. También se engloban aquí cirugías realizadas con fines preventivos, diagnósticos o paliativos.","cirugia.jpg");



DROP TABLE IF EXISTS tbl_usuarios;

CREATE TABLE `tbl_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apaterno` varchar(50) NOT NULL,
  `amaterno` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_usuarios VALUES("1","Fernando","Hernandez","Sanchez","7891206326","fernando02.hdez@gmail.com","Calle Libertad S/N","fernandohdez","$2y$10$QH95D1GgKamO9jVVTjWuRuIh0XGorkfnb8cei7mcOZAbBOm0pz6uq");
INSERT INTO tbl_usuarios VALUES("2","Fernando","Hernandez","Sanchez","7891127849","20200767@uthh.edu.mx","Calle Vicente Guerrero","fernando89","$2y$10$n9phDAO3lq99Y1MuQBQ8UOUCsxkXuLEzpyzNQHqoO8EQQ8cUL5Fu.");
INSERT INTO tbl_usuarios VALUES("3","Fernando","Hernandez","Sanchez","7891127849","20200767@uthh.edu.mx","Calle Vicente Guerrero","fernando89","$2y$10$P.HNIa303khv6jpjNSXhJ.gvm3OE7NafdUHDTB5Ci5rzmuqC0jH8W");
INSERT INTO tbl_usuarios VALUES("4","Fernando","Hernandez","Sanchez","7891127849","20200767@uthh.edu.mx","Calle Vicente Guerrero","fernando89","$2y$10$yY0psBwH8kMc2llCjhStNelWxfF1doytNU6WTYK/4Ql.fLQg0lV1i");
INSERT INTO tbl_usuarios VALUES("5","Fernando","Hernandez","Sanchez","7891127849","20200767@uthh.edu.mx","Calle Vicente Guerrero","fernando89","$2y$10$8N6d8Uu2MPgLjLjtafSpw.HprWSfHGV5.NRWSL9gBOXW.YyMbxpCK");
INSERT INTO tbl_usuarios VALUES("6","Fernando","Hernandez","Sanchez","7891206326","20200767@uthh.edu.mx","ninguna","fernando","$2y$10$GrjClu.GF6bMhT8rX31eveuk8p/bzqk7Q7k.Xd36f5Iqwny8ozzna");
INSERT INTO tbl_usuarios VALUES("7","Fernando","Hernandez","Sanchez","7891206326","20200767@uthh.edu.mx","ninguna","fernando","$2y$10$6.3zSlZqt8LiabJfXCFrcOLIJomDYEKUOl9Ld/2d17AuOq.MGqQo2");
INSERT INTO tbl_usuarios VALUES("8","Fernando","Hernandez","Sanchez","78888888","fernandohdez0823@gmail.com","fufiyfugkvhgulc","fernando","$2y$10$vbzYDUPL05Y53OiuU2xj4.3xCW39hpGH7glkrDiYtIiKC5n8goAMy");
INSERT INTO tbl_usuarios VALUES("9","Fernando","Hernandez","Sanchez","7891206325","20200767@uthh.edu.mx","calle libertad","fernando","$2y$10$U5h1ytzw7VyBp6QuAYKt6./YzpECJSl94XXjwSk.8u/pYSf12xxqO");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","Fernando","sarixej838@v3dev.com","0000-00-00 00:00:00","$2y$10$RriJJNFNbAS5iYQHxruaxOnOImzGxzDTLMqa.RWKn3TSzAjRBe5X.","FLnOFMY9wlxUT3JuXw826oucKV21Gz6DgxsoTEp1xIjdW7Kw3dhrxg1VU2Gl","2023-01-27 21:26:48","2023-01-27 21:26:48");
INSERT INTO users VALUES("2","Fernando Hernández Sánchez","fernando02.hdez@gmail.com","0000-00-00 00:00:00","$2y$10$GYoEGVcwvPcM29zLtnKe4e5ElWlLfwz.ZlXrf9.9CSAj6zn8ZhiF6","","2023-03-18 18:16:23","2023-03-18 18:16:23");



SET FOREIGN_KEY_CHECKS=1;