/*Esta consulta cuenta el número total de usuarios que tienen el rol de "Administrador" */
SELECT COUNT(*) AS TotalUsuarios 
FROM usuario 
WHERE Rol_id_Rol = '02';


/*Esta consulta calcula la suma total del peso de los archivos subidos por el usuario con 
número de documento '99032102146' en la tabla "archivos" */
SELECT SUM(PesoArchivo) AS TotalPesoArchivos 
FROM archivos 
WHERE Usuario_numeroDocumento = '99032102146';


/*muestra aquellos roles que tienen más de un usuario asociado */
SELECT Rol_id_Rol, COUNT(*) AS TotalUsuarios 
FROM usuario 
GROUP BY Rol_id_Rol 
HAVING COUNT(*) > 1;


/*muestra el nombre del usuario y su rol correspondiente.*/
SELECT u.NombreUsuario, r.Nombre_Rol 
FROM usuario u 
JOIN Rol r ON u.Rol_id_Rol = r.id_Rol 
WHERE u.TipoDocumento_id_TipoDocumento = '2';


/*Muestra el nombre del archivo y el nombre del usuario asociado a dicho archivo */
SELECT a.NombreArchivo, u.NombreUsuario 
FROM archivos a 
INNER JOIN usuario u ON a.Usuario_numeroDocumento = u.numeroDocumento;


/*Muestra el nombre del usuario y su rol correspondiente, 
incluyendo los usuarios que no tienen un rol asociado en la tabla "Rol" */
SELECT u.NombreUsuario, r.Nombre_Rol 
FROM usuario u 
LEFT JOIN Rol r ON u.Rol_id_Rol = r.id_Rol;


/*Muestra el nombre del usuario y su rol correspondiente, 
incluyendo los roles que no tienen usuarios asociados en la tabla "usuario" */
SELECT u.NombreUsuario, r.Nombre_Rol 
FROM usuario u 
RIGHT JOIN Rol r ON u.Rol_id_Rol = r.id_Rol;


/*Muestra el nombre del usuario y el nombre del rol en cada combinación */
SELECT u.NombreUsuario, r.Nombre_Rol 
FROM usuario u 
CROSS JOIN Rol r;


/*muestra la fecha de subida más reciente para cada usuario */
SELECT Usuario_numeroDocumento, MAX(fechaSubida) AS UltimaFechaSubida 
FROM archivos 
GROUP BY Usuario_numeroDocumento;