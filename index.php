<?php
    require 'dbconnection.php';

    if(empty($_POST)) {
        $todos = $con->query('SELECT * FROM todo WHERE target_date >= CURRENT_DATE ORDER BY priority, target_date');
        $result = $todos->fetch();
    }
?>

<!DOCTYPE html>
<html lang= "ja">
<?php
    include 'header.php';
    $now = new DateTime();
?>

<body>
	<h3>本日【<?php echo $now->format('Y-m-d'); ?>】のTODOリスト</h3>
	<div class="main_form">

		<?php if($result == null) : ?>
		<div class="alert alert-danger center" role="alert">
			<p>本日のToDoリストはありません！</p>
		</div>
		<?php endif; ?>

	<!-- テーブルにデータある場合 -->
		<table class="table">
			<thead>
				<tr>
					<th>リスト番号</th>
					<th>期限日</th>
					<th>重量度</th>
					<th>リスト内容</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($todos as $todo) : ?>
				<tr>
					<td><?php print(htmlspecialchars($todo['id'])); ?></td>
					<td><?php print(htmlspecialchars($todo['target_date'])); ?></td>
					<td><?php print(htmlspecialchars($todo['priority'])); ?></td>
					<td><?php print(htmlspecialchars($todo['content'])); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<form action="register.php" method="post">
			<div class="row">
				<div class="col-md-3 field-label-responsive">
					<label for="target_date">期限日：</label>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						<input type="date" class="form-control" id="target_date" placeholder="期限日" name="target_date" maxlength="10" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 field-label-responsive">
					<label for="priority">重量度：</label>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						<input type="text" class="form-control" id="priority"
							placeholder="重量度" name="priority" maxlength="3" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 field-label-responsive">
					<label for="content">リスト内容：</label>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						<textarea class="form-control" id="content" name="content" placeholder="リスト内容を入力してください" cols="30" rows="5" required></textarea>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value = "登録する">
		</form>
	</div>

</body>
<?php
    include 'footer.php';
?>
</html>