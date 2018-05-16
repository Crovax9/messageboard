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
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>        
        <div class="container">
        <table class="table table-striped">
            <thead>
                
            </thead>
            
            <tbody>
                <?php
                $id = $_GET['title'];
                $records = $_SESSION['record'];
                    if ($records) {
                        foreach ($records as $record) {
                            if($id == $record['id'])
                            {
                                $title = $record['title'];
                                $message = $record['message'];
                                $imageurl = $record['imageurl'];
                            }
                        }
                    }
                            
                ?>
                <tr>
                    <td><?php print htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></a></td>
                    <td><?php print htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php print htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><img src="<?php print htmlspecialchars($imageurl, ENT_QUOTES, 'UTF-8'); ?>" alt=""></td>
                </tr>
                
            </tbody>
            
        </table>
        <a href="messagemodify.php?title=<?php echo $id ?>" class="btn btn-primary">修正</a>
        <a href="database.php?title=<?php echo $id ?>" class="btn btn-primary">削除</a>

        </div>
    </body>
</html>