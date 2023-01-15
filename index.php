<?php include("includes/header.php"); ?>


<?php include("db.php"); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                   <?=$_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>
            <div class="card card-body"></div>
            <form action="save.php" method="POST">
                <div class="form-group">
                    <input type="text" name="tar" id="" class="form-control" placeholder="tarea" autofocus>
                </div>

                <div class="form-group">
                    <textarea id="my-textarea" class="form-control" name="des" rows="3" placeholder="descripcion" autofocus></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_tarea" value="save_tarea">
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <th>Tarea</th>
                    <th>Descripcion</th>
                    <th>Crear tarea</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                    <?php
                    $query="SELECT * FROM `task`";
                    $resultask=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_array($resultask)){?>
                    <tr>
                        <td><?php echo $row['tarea'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['fecha_crea'] ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                        <td><a href="delte.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr>
                    </tr>
                    <?php } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>