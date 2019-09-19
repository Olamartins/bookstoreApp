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
                <h2 class="title">BOOKS ON THE SHELVE</h2>
            </div>
        </div>
        <div class="row rec-tbl">
            <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-color">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                            $rows = $model->fetch();
                            $i = 1;
                            if(!empty($rows)) {
                                foreach($rows as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['publisher']; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info"> Update </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Delete </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </div>
</body>
</html>
