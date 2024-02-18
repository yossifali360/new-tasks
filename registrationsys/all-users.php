<?php include("inc/header.php");?>

<div class="container">
<div class="row">
    <div class="col-12">
    <h1 class="text-center display-4 border my-5 p-2">All Users</h1>

    </div>
    <div class="col-sm-10 mx-auto">
        <div class="border my-3"> 
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // include("inc/db.php");
                    include("classes/User.php");
                    $i=1;          
                    ?>
                    <?php foreach(User::getAllUsers() as $row ) :  ?>
                    <tr>
                    <?php /* ?>
                        <th scope="row"><?php echo $i++ ;?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <?php */ 
                        
                        
                        
                        ?>
                        <th scope="row"><?php echo $i++ ;?></th>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->phone; ?></td>

                        
                       
                    </tr>
                    <?php endforeach; ?>
                </tbody>





            </table>


        </div> 





    </div>




</div>




</div>





















<?php include("inc/footer.php");?>