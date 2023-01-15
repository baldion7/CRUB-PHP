<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `task` WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['tarea'];
        $descripcion = $row['descripcion'];
    }
}
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $descripcion = $_POST['description'];
    $query = "UPDATE task SET tarea = '$title', descripcion ='$descripcion' WHERE  id=$id";
    mysqli_query($conn,$query);
    header("Location: index.php");
}
?>
<?php include("includes/header.php"); ?>
<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="actualisar tarea">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
                </div>
                <button class="btn-success" name="update">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
</div>
<?php include("includes/footer.php"); ?>