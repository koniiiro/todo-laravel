<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz3</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>作成日時</th>
            <th>更新日付</th>
        </tr>
        <?php foreach($quizzes as $quiz): ?>
            <tr>
                <td><?php echo $quiz['id']; ?></td>
                <td><?php echo $quiz['name']; ?></td>
                <td><?php echo $quiz['type']; ?></td>
                <td><?php echo $quiz['created_at']; ?></td>
                <td><?php echo $quiz['updated_at']; ?></td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>