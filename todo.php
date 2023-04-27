<?php
    session_start();
    require 'connection.php';

    //追加処理
    if(isset($_POST['btn_regist'])){
        $target_date = mysqli_real_escape_string($conn, $_POST['target_date']);
        $priority = mysqli_real_escape_string($conn, $_POST['priority']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);

        $sql = "INSERT INTO todo (target_date, priority, content, remark) VALUES ('$target_date','$priority','$content','$remark')";
        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql)
        {
            $_SESSION['message'] = "ToDoリストは正常に登録しました。";
            header("location: todo_create.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "ToDoリストは正常に登録しません。";
            header("location: todo_create.php");
            exit(0);
        }
    }

    //更新処理
    if(isset($_POST['btn_update']))
    {
        $target_date = mysqli_real_escape_string($conn, $_POST['target_date']);
        $priority = mysqli_real_escape_string($conn, $_POST['priority']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $todo_id = mysqli_real_escape_string($conn, $_POST['todo_id']);

        $sql = "UPDATE todo SET target_date = '$target_date', priority = '$priority', content = '$content', remark = '$remark' WHERE id = '$todo_id' ";
        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql)
        {
            $_SESSION['message'] = "ToDoリストは正常に更新しました。";
            header("location: home.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "ToDoリストは正常に更新しません。";
            header("location: todo_edit.php");
            exit(0);
        }

    }

    //削除処理
    if(isset($_POST['btn_delete']))
    {
        $todo_id = mysqli_real_escape_string($conn, $_POST['btn_delete']);

        $sql = "DELETE FROM todo WHERE id = '$todo_id' ";
        $run_sql = mysqli_query($conn, $sql);

        if ($run_sql)
        {
            $_SESSION['message'] = "ToDoリストは正常に削除しました。";
            header("location: home.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "ToDoリストは正常に削除しません。";
            header("location: home.php");
            exit(0);
        }
    }
?>