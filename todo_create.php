<?php
    session_start();
?>
<?php include('header.php'); ?>
<body>
    <div class="container mt-3 mb-3">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ToDoリスト追加画面
                            <a href="home.php" class="btn btn-primary float-right">ホームへ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="todo.php" method="POST">
                            <div class="mb-3">
                                <label for="target_date">期限日 <span style="color:red">※</span>：</label>
                                <input type="text" class="form-control" id="target_date" placeholder="期限日を入力してください" name="target_date" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="priority">重量度<span style="color:red">※</span>：</label>
                                <input type="text" class="form-control" id="priority" placeholder="重量度を入力してください" name="priority" maxlength="3" required>
                            </div>
                            <div class="mb-3">
                                <label for="content">リスト内容<span style="color:red">※</span>：</label>
                                <textarea class="form-control" id="content" name="content" placeholder="リスト内容を入力してください" cols="30" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="remark">備考：</label>
                                <input type="text" class="form-control" id="remark" placeholder="備考を入力してください" name="remark" maxlength="100">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="btn_regist">登録する</button>
                            </div>
                        </form>
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