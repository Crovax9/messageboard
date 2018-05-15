<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>MessageBoard</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">MessageBoard</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="http://laravel-message-board.herokuapp.com/messages/create">新規メッセージの投稿</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>        
        <div class="container">
                        
            
    <h1>メッセージ一覧</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                
<?php
            $records = $_SESSION['record'];
            if ($records) {
                foreach ($records as $record) {
                    $id = $record['id'];
                    $title = $record['title'];
                    $message = $record['message'];
                    
                    
?>
                
                <tr>
                    <td><a href="detail.php?title=<?php echo $id ?>"><?php print htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></a></td>
                    <td><?php print htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php print htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
<?php
                }
            }
?>
                
                
            </tbody>
            
        </table>
        <a href="messageinput.php" class="btn btn-primary">新規メッセージの投稿</a>

        </div>
    </body>
</html>