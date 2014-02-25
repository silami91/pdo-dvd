<!DOCTYPE html>
<html>
<head>
    <title>DASHBOARD</title>
</head>


    <?php
           //How do you pass around the PDO?
        require __DIR__ . '/vendor/autoload.php';
        require_once 'db.php';

        use Symfony\Component\HttpFoundation\Session\Session;
        use Symfony\Component\HttpFoundation\RedirectResponse;
        use Carbon\Carbon;
        use ITP\SongQuery\SongQuery;

        $session = new Session();
        $session->start();

        $userName = $session->get("userName");
        $email = $session->get("email");
        $compTime = Carbon::now()->diffInSeconds($session->get('loginTime'));
        $humanTime = Carbon::now()->subSeconds($compTime)->diffForHumans();

        $songQuery = new SongQuery($pdo);
        $songs = $songQuery
            ->withArtists()
            ->withGenre()
            ->orderBy('title')
            ->all();

        if($session->get('password') == null)
        {
            $session->clear();
            $session->getFlashBag()->set('errorLogin', 'Error logging in. Please check your username and password.');
            $response = new RedirectResponse('login.php');
            $response->send();
            die;
        }

    ?>
<body>
<div style="float: right;" >
<a style="float: right;" href="logout.php">Logout</a><br>
<p style="float: right;"><?php echo $userName.' '.$email?></p><br>
<p style="float: right;"><?php echo 'Last Login: '.$humanTime ?></p>
</div>
<?php //var_dump($session->getFlashbag()->all()); ?>
<?php foreach($session->getFlashbag()->get('successfulLogin') as $message): ?>
    <?php echo $message; ?>
<?php endforeach ?>
        <div>
            <h2>Songs</h2>
            <table border="1px">
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Price</th>
                </tr>
                <?php foreach($songs as $song): ?>
                    <tr>
                        <td><?php echo $song->title?></td>
                        <td><?php echo $song->artist_name?></td>
                        <td><?php echo $song->genre?></td>
                        <td><?php echo "$".$song->price?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
</body>
</html>