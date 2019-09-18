<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>
<body>
    <div class="container">
        <div>
            <div class="row wrap">
                <div class="col-md-12">
                    <h2 class="title">ADD BOOK INFORMATION</h2>
                    <?php 
                        
                        include "model.php"; 
                        $model = new Model();
                        $id = $_REQUEST['id'];
                        $row = $model->edit($id);
                        if(isset($_POST["update"])){
                            if(isset($_POST['title']) && isset($_POST['isbn']) && isset($_POST['author']) && isset($_POST['category']) && isset($_POST['publisher'])) {
                        
                                if(!empty($_POST['title']) && !empty($_POST['isbn']) && !empty($_POST['author']) && !empty($_POST['category']) && !empty($_POST['publisher']) ) {
            
                                    $data['id'] = $id;
                                    $data['title']  =   $_POST['title'];
                                    $data['isbn']   =   $_POST['isbn'];
                                    $data['author'] =   $_POST['author'];
                                    $data['category']  =   $_POST['category'];
                                    $data['publisher']  =   $_POST['publisher'];

                                    $update = $model->update($data);

                                    if($update) {
                                        echo "<script>alert('Records successfully updated');</script>";
                                        echo "<script>window.location.href = 'records.php';</script>";
                                    } else {
                                        echo "<script>alert('Records update failed');</script>";
                                        echo "<script>window.location.href = 'records.php';</script>";
                                    }
            
                                } else {
                                    echo '<script>alert("failed!"); </script>';
                                    header("Location: update.php?id=$id");
                                } // no empty field
            
                            }// if field set
                        }
                    ?>
                    <div class="wrapform">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="title">Book Title:</label>
                                <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" id="title" placeholder="Book title">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN Number:</label>
                                <input type="text" name="isbn" value="<?php echo $row['isbn']; ?>" class="form-control" id="isbn" placeholder="ISBN Number">
                            </div>
                            <div class="form-group">
                                <label for="author">Book Author:</label>
                                <input type="text" name="author" value="<?php echo $row['author']; ?>" class="form-control" id="author" placeholder="Author">
                            </div>
                            <div class="form-group">
                                <label for="category">Book Category:</label>
                                <select name="category" value="<?php echo $row['category']; ?>" class="form-control" id="isbn">
                                    <option value="Programming">Programming </option>
                                    <option value="Accoutning ">Accoutning </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher:</label>
                                <input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" class="form-control" id="publisher" placeholder="Publisher">
                            </div>
                            <button type="submit" name="update" class="btn btn-info">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
</body>
</html>