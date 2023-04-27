<?php
    session_start();
    require 'connection.php';
?>
<?php include('header.php'); ?>
<body>    
    <div class="container mt-3 mb-3">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ToDoリスト編集画面
                            <a href="home.php" class="btn btn-primary float-right">ホームへ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $todo_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $sql = "SELECT * FROM todo WHERE id = '$todo_id' ";
                                $run_sql = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($run_sql) > 0)
                                {
                                    $todo = mysqli_fetch_array($run_sql);
                                    ?>

                                    <form action="todo.php" method="POST">
                                        <input type="hidden" name="todo_id" value="<?= $todo['id']; ?>">

                                        <div class="mb-3">
                                            <label for="target_date">期限日 <span style="color:red">※</span>：</label>
                                            <input type="text" class="form-control" id="target_date" name="target_date" value="<?= $todo['target_date']; ?>" maxlength="10" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="priority">重量度 <span style="color:red">※</span>：</label>
                                            <input type="text" class="form-control" id="priority" value="<?= $todo['priority']; ?>" name="priority" maxlength="3" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="content">リスト内容 <span style="color:red">※</span>：</label>
                                            <textarea class="form-control" id="content" name="content" cols="30" rows="5" required><?= $todo['content']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="remark">備考：</label>
                                            <input type="text" class="form-control" id="remark" value="<?= $todo['remark']; ?>" name="remark" maxlength="100">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="btn_update">更新する</button>
                                        </div>
                                    </form>

                                    <?php
                                }
                                else
                                {
                                    echo "<h4>There haven't no record found!</h4>";
                                }
                            }
                        ?>
                        
                    </div>
                </div>        
            </div>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>
<script>
    $('#target_date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
