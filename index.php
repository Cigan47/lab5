<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Lab1-2.css" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a class="nav-link" href="list.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Сообщество</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Новое</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <div class="main-wrap">
                    <div class="main-content">
					<?php
						$id = $_GET['id'];
        
						$servername = "localhost";
						$username = "lab5";
						$password = "lab5";
						$databasename = "blog";
		
						$conn = new mysqli($servername, $username, $password, $databasename);
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
		
						$sql = "SELECT * FROM posts WHERE id='$id'";
						$result = mysqli_query($conn, $sql);
		
						$row = mysqli_fetch_assoc($result);

						$date = $row['date'];
						$title = $row['title'];
						$text = $row['text'];
					?>
                        <div class="blog-item">
                            <div class="avatar">
                                <div class="img-wrap">
                                    <img src="./profile-icon.svg" alt="profile-icon">
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><?= $title ?></h3>
								<p class="blog-text"><?= $text ?></p>
                                <div class="blog-actions">
                                    <div class="actions">
                                        <div class="action">
                                            <div class="action-img">
                                                <img src="./like.svg" alt="">
                                            </div>
                                            <span class="action-count">
                                                5
                                            </span>
                                        </div>
                                        <div class="action">
                                            <div class="action-img">
                                                <img src="./repost.svg" alt="">
                                            </div>
                                            <span class="action-count">
                                                4
                                            </span>
                                        </div>
                                        <div class="action">
                                            <div class="action-img">
                                                <img src="./comment.svg" alt="">
                                            </div>
                                            <span class="action-count">
                                                1
                                            </span>
                                        </div>
                                    </div>
									<span><b>Edit Date:</b> <?= $date ?></span>
									<a style="color: #000000" href="update.php?id=<?= $id?>">Edit</a>
									<a style="color: #000000" href="delete.php?id=<?= $id?>">Delete</a>
                                    <span class="username">
                                        Имя Пользователя
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ad-bar">
                        <div class="bar-block">
                            <span class="bar-text">Здесь могла быть ваша реклама</span>
                        </div>
                        <div class="bar-block">
                            <span class="bar-text">AdBlock</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Сообщество</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Новое</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</body>

</html>