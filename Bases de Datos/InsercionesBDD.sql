insert into Rol ( id_Rol, Nombre_Rol) 
values 
( "01", "Cliente" ),( "02", "Administrador" );

insert into tipodocumento ( nombre_TipoDocumento, acronimo) 
values 
( "Cedula de Ciudadania", "C.C" ),( "Tarjeta de Identidad", "T.I" );

insert into usuario (numeroDocumento, NombreUsuario, Correo, numerocelular, Contraseña, Rol_id_Rol, TipoDocumento_id_TipoDocumento) 
values 
("1033814672", "Pepe Lopez Cierra", "usuario@example.com", "3214567892",SHA2("123456789", 256), "01", "1"),
("24685716", "Luz Mary Pelaez Ortiz", "usuario@example.com", "3216547890",SHA2("123456789", 256), "01", "1"),
("24954875", "David Andres Pelaez", "usuario@example.com", "3214867540",SHA2("123456789", 256), "02", "1"),
("24954687", "Jose Luis Perez", "usuario@example.com", "3219764315",SHA2("123456789", 256), "02", "1"),
("99032102146", "Juan Pablo Garzia", "usuario@example.com", "3218495673",SHA2("123456789", 256), "01", "2"),
("99032156962", "Diana Luisa Gutierrez", "usuario@example.com", "3219617456",SHA2("123456789", 256), "01", "2");

insert into reporteserrores (Administrador, Usuario_numeroDocumento, solicitudreportes) 
values
("David Pelaez","99032102146","Mejoras por hacer"),
("Jose Luis","24685716","Fallo en pagina");

insert into archivos (Usuario_numeroDocumento, NombreArchivo, TipoArchivo, fechaSubida, PesoArchivo)
values
("1033814672","Hoja de Vida",".pdf","18/06/2023","30kb"),
("24685716","Carta de certificacion",".docx","18/06/2023","100kb"),
("99032102146","Cuentas Trabajo",".xlsx","18/06/2023","69kb"),
("99032156962","Presentacion Grupo-1",".pptx","18/06/2023","156kb");