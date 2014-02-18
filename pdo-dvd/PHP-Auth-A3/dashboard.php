<!DOCTYPE html>
<html>
<head>
    <title>DASHBOARD</title>
</head>
<body>
    <a style="align: right;" href="logout.php">Logout</a>
    <?php
           //How do you pass around the PDO?
        require __DIR__ . '/vendor/autoload.php';
        $songs = new SongQuery($pdo);
    ?>
        <div>
            <table>
                <th>
                    <td>Song</td>
                    <td>Artist</td>
                    <td>Genre</td>
                    <td>Play Count</td>
                </th>
                <?php foreach($songs as $song): ?>
                <tb>
                    <td><?php echo $song->title?></td>
                    <td><?php echo $song->artist?></td>
                    <td><?php echo $song->genre?></td>
                    <td><?php echo $song->play_count?></td>
                </tb>
                <?php endforeach ?>
            </table>
        </div>
</body>
</html>