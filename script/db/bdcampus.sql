USE campusland;
SHOW databases;
SHOW TABLES;
SELECT * FROM countries INNER JOIN regions WHERE countries.id = regions.id_country;
SELECT * FROM countries INNER JOIN regions ON countries.id = regions.id_country WHERE countries.id = 14;
SELECT countries.id AS Id_Pais, countries.name_country AS Nombre_Pais, regions.id AS Id_Region, regions.name_region AS Nombre_Region, cities.id AS Id_Ciudad, cities.name_city AS Nombre_Ciudad FROM cities INNER JOIN regions ON cities.id_region = regions.id INNER JOIN countries ON regions.id_country = countries.id;
SELECT * FROM cities INNER JOIN regions ON cities.id_region = regions.id INNER JOIN countries ON regions.id_country = countries.id;
SELECT * FROM areas;
SELECT * FROM position;