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
                            ToDoリスト一覧画面
                            <a href="todo_search.php" class="btn btn-success float-right ml-3">ToDoリスト検索へ</a>
                            <a href="todo_create.php" class="btn btn-primary float-right">ToDoリスト追加へ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>リスト番号</th>
					                <th>期限日</th>
					                <th>重量度</th>
					                <th>リスト内容</th>
                                    <th>備考</th>
                                    <th>処理内容</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM todo ORDER BY target_date, priority";
                                    $run_sql = mysqli_query($conn, $sql);
                                    $count = 0;
                                    if(mysqli_num_rows($run_sql) > 0)
                                    {
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
                                                <td>
                                                    <a href="todo_edit.php?id=<?= $todo['id']; ?>" class="btn btn-warning btn-sm">編集</a>
                                                    <form action="todo.php" method = "POST" class="d-inline">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="btn_delete" value="<?= $todo['id']; ?>">削除</button>
                                                    </form>                                                    
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h4>登録されたToDoリストはありません！</h4>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  <?php include('footer.php'); ?>
