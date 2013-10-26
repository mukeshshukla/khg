<?php
session_start();
include '../include/config.php';

if ($_SESSION['token'] !== md5($_SESSION['email'] . session_id())) {
    array_push($_SESSION['errors'], 'Sorry You have lost your chance.');
    header('location: index.php?error=true');
}
?>
<div class="maincontainer">
    <div class="heading"><h1>Welcome to KHG</h1></div>
    <div class="content">
        <form name="ques" method="post" action="save_ques.php">
<?php
$select_ques = "select * from questions where level = 1 order by rand()";

$res = mysql_query($select_ques);
while ($row = mysql_fetch_object($res)) {
    ?>
                <div class="row"> 
                    <div class="ques">
                <?php
                echo $row->Question;
                ?>
                    </div>
                        <?php
                        $select_ans = "select * from answers where qid = " . $row->id;
                        $res_ans = mysql_query($select_ans);
                        while ($row_ans = mysql_fetch_object($res_ans)) {
                            ?>
                        <div class="answer">
                            <input type="checkbox" value="<?php echo $row_ans->id ?>" name="annswer_<?php echo $row_ans->qid ?>[]" > <?php echo $row_ans->ans; ?>
                        </div>
                            <?php
                        }
                        ?>
                </div>
            <input type="hidden" name="ques[]" value="<?php echo $row->id; ?>">
                    <?php
                }
                ?>
            <div class="row">
                <label for="name" ></label>
                <input type="submit" name="submit" value="Done" />
            </div>
            <input type="hidden" name="token" value="<?php echo session_id(); ?>">
           
        </form>
    </div>
</div>