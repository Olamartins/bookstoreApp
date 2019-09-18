<!DOCTYPE html>
<html lang="en">
<?php include "head.php" ?>
<body>
    <div class="container">
        <?php include "nav.php" ?>
    </div>
    <div class="container">
        <div>
            <div class="row wrap">
                <div class="col-md-12">
                    <h2 class="title">ADD BOOK INFORMATION</h2>
                    <?php 
                        
                        include "model.php"; 
                        $model = new Model();
                        $insert = $model->insert();
                    
                    ?>
                    <div class="wrapform">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="title">Book Title:</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Book title" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN Number:</label>
                                <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN Number" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="author">Book Author:</label>
                                <input type="text" name="author" class="form-control" id="author" placeholder="Author" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="category">Book Category:</label>
                                <select name="category" class="form-control" id="isbn">
                                    <option value="Programming">Programming </option>
                                    <option value="Accoutning ">Accoutning </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher:</label>
                                <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher" autocomplete="off" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
</body>
</html>