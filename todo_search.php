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
                        <h4>
                            ToDoリスト検索画面
                            <a href="home.php" class="btn btn-primary float-right">ホームへ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method = "POST" class="d-inline">
                            <div class="row">
                                <div class="col"><label for="s_date">期限日（From）：</label></div>
  			                    <div class="col"><input type="text" class="form-control" id="s_date" name="s_date" maxlength="10"></div>
  			                    <div class="col"><label for="e_date">期限日（To）：</label></div>
  			                    <div class="col"><input type="text" class="form-control" id="e_date" name="e_date" maxlength="10"></div>
                                <div class="col"><button type="submit" class="btn btn-secondary btn-md" name="btn_search">検索</button></div>
                            </div>
                        </form>
                        <div class="row mt-5">
                            <?php
                                $count = 0;
                                if(isset($_POST['btn_search']))
                                {
                                    $s_date = mysqli_real_escape_string($conn, $_POST['s_date']);
                                    $e_date = mysqli_real_escape_string($conn, $_POST['e_date']);
                                    $sql = "SELECT * FROM todo WHERE target_date <= '$e_date' AND target_date >= '$s_date' ";
                                }
                                else{
                                    $sql = "SELECT * FROM todo WHERE target_date = CURRENT_DATE ORDER BY priority";
                                }
                                $run_sql = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($run_sql) > 0)
                                {
                                ?>
                                    <h5>ToDoリスト検索結果</h5>
                                    <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>リスト番号</th>
					                        <th>期限日</th>
					                        <th>重量度</th>
					                        <th>リスト内容</th>
                                            <th>備考</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($run_sql as $todo)
                                        {
                                            $count++;
                                            ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?= $todo['target_date'] ?></td>
                                                <td><?= $todo['priority'] ?></td>
                                                <td><?= $todo['content'] ?></td>
                                                <td><?= $todo['remark'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        $_SESSION['message'] = "登録されたToDoリストはありません。";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  <?php include('footer.php'); ?>
  <script>
    $('#s_date').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#e_date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
