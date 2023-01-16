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
    <?php
	$titleError = "";
	$textError = "";

	function checkTitleValidity($value) {
		$value = trim($value);

		if (empty($value)) {
			return "Поле пустое!";
		}
		elseif (strlen($value) < 4) {
			return "Минимум 4 символа!";
		}
		elseif (strlen($value) > 120) {
			return "Максимум 30 символов!";
		}
		else if (!preg_match("/^[a-z\x{0410}-\x{042F}0-9 ]+$/iu", $value)) {
			return "Запрещено использование спец. символов!";
		}

		return true;
	}

	function checkTextValidity($value) {
		$value = trim($value);

		if (empty($value)) {
			return "Поле пустое!";
		}
		elseif (strlen($value) < 4) {
			return "Минимум 4 символа!";
		}

		return true;
	}

	date_default_timezone_set('Europe/Moscow');

	$date = date('Y-m-d');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$servername = "localhost";
		$username = "lab5";
		$password = "lab5";
		$databasename = "blog";

		$conn = new mysqli($servername, $username, $password, $databasename);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

        $title = $_POST['title'];
        $text = $_POST['text'];
        $edit_date = $date;

		$titleIsValid = checkTitleValidity($title);
		$textIsValid = checkTextValidity($text);

		if (gettype($titleIsValid) == "string") {
			$titleError = $titleIsValid;
		}
		if (gettype($textIsValid) == "string") {
			$textError = $textIsValid;
		}
		if ($titleIsValid === true && $textIsValid === true) {
			$sql = "INSERT INTO posts (date, title, text) VALUES ('$edit_date', '$title', '$text')";

			$conn->query($sql);
			$id = $conn->insert_id;


			$conn->close();
			header("Location: http://localhost/lab5/index.php?id=$id", TRUE, 301);
			exit( );

		}

    }
    ?>

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
				<div class="center">
					<div class="form-wrap">
						<form method="POST" action="create.php">
							<div class="field-wrap">
								<div class="form-field">
									<label class="form-label" for="title">Название поста:</label>
									<input id="title" class="form-input" type="text" name="title" />
								</div>
								<div class="error-container"><?php echo $titleError ?></div>
							</div>
							<div class="field-wrap">
								<div class="form-field">
									<label class="form-label" for="text">Текст:</label>
									<textarea id="text" class="form-input" name="text" cols="30" rows="10"></textarea>
								</div>
								<div class="error-container"><?php echo $textError ?></div>
							</div>
							<div class="form-field">
								<span class="form-label">Время создания:</span>
								<span><?php echo $date ?></span>
							</div>
							<div class="action-panel">
								<input class="submit-btn" type="submit" value="Сохранить" />
							</div>
						<!-- <form method="POST" action="create.php">
						Название поста: <input type="text" name="title" required /><br />
						Текст: <textarea name="text" cols="30" rows="10" required></textarea><br />
						Время создания: <?php echo $date ?><br />
						<input type="submit" value="Сохранить" /> -->
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>

    
</body>

</html>