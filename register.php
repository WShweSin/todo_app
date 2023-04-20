<?php
    require 'dbconnection.php';
    if(!empty($_POST)){

        $todos = $con->query('SELECT * FROM todo');
        $result = $todos->fetch();

        try {
            /*
            $sql = 'INSERT INTO todo (target_date, priority, content) VALUES (:TargetDate, :Priority, :Content)';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':TargetDate', $_POST['target_date'], PDO::PARAM_STR);
            $stmt->bindValue(':Priority', $_POST['priority'], PDO::PARAM_STR);
            $stmt->bindValue(':Content', $_POST['content'], PDO::PARAM_STR);
            $stmt->execute();
            exit();
            */
            $regist = $con->prepare("INSERT INTO todo (target_date, priority, content) VALUES (?,?,?)");
            $regist->bindParam("target_date", $_POST['target_date']);
            $regist->bindParam("priority", $_POST['priority']);
            $regist->bindParam("content", $_POST['content']);

            $regist->execute(array($_POST['target_date'], $_POST['priority'], $_POST['content']));
            if ($regist) {
                $msg = "登録完了しました";
            } else {
                $msg = "エラーですクソコード書くな！";
            }
        }catch (PDOException $e) {
            echo 'データベースにアクセスできません！'.$e->getMessage();
        }
    }

?>
<!DOCTYPE html>
<html lang= "ja">
<?php
    include 'header.php';
?>

<body>
	<div class="main_form">
		<h3>TODOリスト一覧</h3>
		<div class="alert alert-info center" role="success">
			<p><?php echo($msg); ?></p>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>リスト番号</th>
					<th>期限日</th>
					<th>重量度</th>
					<th>リスト内容</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($todos as $todo) : ?>
				<tr>
					<td><?php print(htmlspecialchars($todo['id'])); ?></td>
					<td><?php print(htmlspecialchars($todo['target_date'])); ?></td>
					<td><?php print(htmlspecialchars($todo['priority'])); ?></td>
					<td><?php print(htmlspecialchars($todo['content'])); ?></td>
					<td><button type="button" class="btn btn-warning" id="btnUpdate" value="ss">編集</button></td>
					<td><button type="button" class="btn btn-danger" id="btnDelete">削除</button></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>

</body>
<?php
    include 'footer.php';
?>
</html>