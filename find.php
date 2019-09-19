<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>
<body>
    <div class="container">
        <?php include "nav.php" ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">SEARCH FOR A BOOK</h2>
                <div class="form-wrap">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="findisbn" class="form-control" id="findisbn" placeholder="Book ISBN Number" autocomplete="off" required />
                        </div>
                        <button type="submit" name="submit" class="btn btn-info">SEARCH BY ISBN NO</button>
                    </form>
                </div>
                <div class="row rec-tbl">
                    <table class="table table-color table-responsive">
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>ISBN NUMBER</th>
                            <th>AUTHOR</th>
                            <th>CATEGORY</th>
                            <th>PUBLISHER</th>
                            <th>ACTION</th>
                        </tr>
                        
                    </thead>
                        <tbody>
                        <?php 
                            include "model.php";
                            $model = new Model();
                            $data = $model->find();
                            if(!empty($data)) {
                                                    
                        ?>
                         <tr>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['isbn']; ?></td>
                            <td><?php echo $data['author']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td><?php echo $data['publisher']; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $data['id']; ?>" class="btn btn-info"> Update </a>
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"> Delete </a>
                            </td>
                        </tr>
                        <?php 
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
