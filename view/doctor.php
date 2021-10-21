<?php
$usuario_actual =$_GET['id'];

require '../model/db.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="StyleSheet" href="../styles/estilos.css" TYPE="text/css"">
    <title>DocApp</title>
</head>
<body class="body2">
    <nav class="navbar navbar-light bg-light mb-5  bg-opacity-75 shadow">
        <div class="m-3 col d-flex justify-content-around">
            <button id="agregar" class=" btn btn-success">Agregar Paciente</button>
            <form action="#">
                <input type="hidden" id="iddoctor" value='<?php echo $usuario_actual?>'>
                <input name="buscar" id="buscar" class="form-control text-center" type="search" placeholder="Buscar usuario" aria-label="Search">
            </form>
            <a class=" btn btn-danger" href="./index.php">Cerrar sesión</a>
        </div>
    </nav>
    
    <div class="col p-5 rounded-end card shadow mb-5 container" style="display: none;" id="form">
        <form action="../controller/DoctorController.php?control=3&idDoctor=<?php echo $usuario_actual?>" method="POST">
            <div class="mb-3">
                <div id="emailHelp" class="form-text">Escriba la Información del Paciente</div>
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                <input type="datetime-local" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="comentarios" id="comentarios"></textarea>
                <label for="comentarios">Comentarios</label>
            </div>
            <div class="alert alert-danger " id="campos" role="alert" style="display:none">
              Error , Los Campos No Pueden Ir Vacíos 
            </div>
            
            <button type="submit" class="btn btn-primary" id="agregarpaciente">Agregar</button>
        </form>
    </div>
    <!-- aqui bajo va la tabla o info de los pacientes -->
    <table id=tablaPacientes class="table table-light shadow  container">
                    <thead class="text-center ">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>comentarios</th>
                        <th>Fecha de cita</th>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                        $query="SELECT * FROM paciente WHERE idDoctor=$usuario_actual";
                        $resultado=mysqli_query($db,$query);
                        while($ver=mysqli_fetch_row($resultado)){

                            ?>
                        <tr>
                            <td><?php echo $ver[1] ?></td>
                            <td><?php echo $ver[2] ?></td>
                            <td><?php echo $ver[3] ?></td>
                            <td><?php echo $ver[4] ?></td>
                            <td><?php echo $ver[6] ?></td>

                        </tr>
                        <?php }?>
                    </tbody>

                </table>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/doctor.js"></script>
</html>