Descripción de la solución:

Se realizó el CRUD del producto

Se puede crear,editar(actualizar), eliminar y ver un producto

Los datos del producto son los mismos que se dieron en las instrucciones

El modulo de ventas se elige el id del producto se le agrega una cantidad 
si quiere y el precio se calcula automaticamente

Se valida que el stock no puede quedar negativo, (MAXIMO CERO)


LAS DOS CONSULTAS DIRECTAS A LA DB:
Producto con mayor stock y producto mas vendido 
estan en el archivo inventariosdb.php en sus respectivas funciones


Finalmente por cuestiones de tiempo obviamente no se puede hacer un 100%
en cuanto al diseño, el user_experience y falta por hacer unas validaciones 
para que el sistema no se rompa

---------------------------------------------------------
PASOS PARA INSTALACIÓN Y MARCHA EN PRUEBA

1. Instale o configure un paquete de desarrollo web como lo es 
XAMPP O WAMP e incluya la carpeta proyectoCafeteria en la ruta donde se Instala

Usualmente es en disco c o d en la carpeta xampp o wamp y dentro de la carpeta htdocs
Aqui debe incluir la carpeta del proyecto mencionada anteriormente

2. Debe abrir el gestor de db mysql usualmente es en la ruta del navegador
localhost:[el puerto asignado en el paquete de desarollo web] / phpmyadmin

Aqui debe darle la opcion importar y subir el archivo sql para que cargue la base de datos
con las tablas y registros actuales

3. Finalmente dirigase al navegador a:
http://localhost:[el puerto asignado en el paquete de desarollo web]/proyectoCafeteria/

Y empezará a correr el aplicativo