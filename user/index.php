
<?php
session_start();
?>
<div class="maincontainer">
    <div class="heading"><h1>Welcome to KHG</h1></div>
   <?php if(isset($_REQUEST['error'])):?>
    <div class="error">
        <ul>
            <?php 
                foreach($_SESSION['errors'] as $error){
                    echo "<li>$error</li>";
                }
            ?>
        </ul>
        
    </div>
   <?php endif;?>
<form method="post" action="save_user_data.php">
    <div class="row">
        <label for="name" >Name:</label>
        <input type="text" name="name" value="" />
    </div>
    <div class="row">
        <label for="email" >Email:</label>
        <input type="text" name="email" value="" />
    </div>
    <div class="row">
        <label for="name" ></label>
        <input type="submit" name="submit" value="Get me the access" />
    </div>
    <input type="hidden" name="token" value="<?php echo session_id();?>">
    
</form>
    </div>