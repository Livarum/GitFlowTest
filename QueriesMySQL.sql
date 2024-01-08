/*Modify timezone*/
SET GLOBAL time_zone = '-06:00';

SELECT * FROM data_test.personal_access_tokens;

SELECT * FROM data_test.products;

SELECT * FROM data_test.users;

SELECT * FROM data_test.roles;

SELECT * FROM data_test.role_has_permissions;

SELECT * FROM data_test.permissions;
