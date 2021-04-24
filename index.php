<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_calculator"); ?>
<?php  if(isset($_SESSION['message'])): ?>


<?php endif ?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackBudget</title>
    <link rel="stylesheet" href="./style_Track.css">

</head>
<body>
    <nav class="navigation-main">
        <span class="navigation">TrackBudget</span>
        <span class="nav-notes"><a href="./notes.html">Notes</a></span>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col1">
                <h2 class="title">Add Expense</h2>
                <hr><br>
                <form action="process.php" method="POST">
                    <div class="">
                        <label for="budgetTitle">Budget Title</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Enter Budget Title" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="amount-div">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  value="<?php echo $amount; ?>">
                    </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col2">
                <h2 class="title">Total Expenses : ₹ <?php echo $total;?></h2>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='error-msg'role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>

                                </div>
                                ";
                    }

                ?>
                <h2>Expenses List</h2>

                <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM budget");
                ?>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Budget Name</th>
                                <th>Budget Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td> ₹ <?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn-edit">edit</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>"  class="btn-delete">delete</a>
                                </td>
                            </tr>
                            

                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-distributed">
        <div class="footer-left">
          <h3>Track<span>Budget</span></h3>
          <p class="footer-name">Design By Sanjay Suthar</p>
        </div>
        <div class="footer-center">
          <div>
            <p><span>Parul University</span> Vadodara, India</p>
          </div>
          <div>
            <p><a href="">sanjaysuthar786786@gmail.com</a></p>
          </div>
        </div>
        <div class="footer-right">
          <p class="footer-about">
          <span>About this Platform</span>
          This Platform is for Student Who want to track and keep notes.
          </p>
        </div>
   </footer>
</body>
</html>