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
	date_default_timezone_set('Europe/Moscow');

	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

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
		else if (!preg_match("/^[a-z\x{0410}-\x{042F}0-9 ]+$/ui", $value)) {
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

    $id = 0;
    $title = '';
    $text = '';
    $latest_edit_date = date('Y-m-d');
	$current_edit_date = date('Y-m-d');

	$titleError = "";
	$textError = "";

	$servername = "localhost";
	$username = "lab5";
	$password = "lab5";
	$databasename = "blog";
		
	$conn = new mysqli($servername, $username, $password, $databasename);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

		$sql = "SELECT * FROM posts WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		
		$row = mysqli_fetch_assoc($result);

		$latest_edit_date = $row['date'];
		$title = $row['title'];
		$text = $row['text'];

    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$sendedTitle = $_POST['title'];
		$sendedText = $_POST['text'];

		$titleIsValid = checkTitleValidity($sendedTitle);
		$textIsValid = checkTextValidity($sendedText);

		$id = $_GET['id'];

		if (gettype($titleIsValid) == "string") {
			$titleError = $titleIsValid;
		}
		if (gettype($textIsValid) == "string") {
			$textError = $textIsValid;
		}

		$date = $_POST['editDate'];
		$title = $_POST['title'];
		$text = $_POST['text'];


		if ($titleIsValid === true && $textIsValid === true) {
			$sql = "UPDATE posts SET date = '$date', title = '$title', text = '$text' WHERE id='$id'";
			$result = mysqli_query($conn, $sql);

			$conn->close();
			header("Location: http://localhost/lab5/list.php", TRUE, 301);
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
						<form method="post" action="update.php?id=<?= $id ?>">
							<div class="field-wrap">
								<div class="form-field">
									<label class="form-label" for="title">Название поста:</label>
									<input id="title" class="form-input" type="text" name="title" value="<?= $title ?>" />
								</div>
								<div class="error-container"><?php echo $titleError ?></div>
							</div>
							<div class="field-wrap">
								<div class="form-field">
									<label class="form-label" for="text">Текст:</label>
									<textarea id="text" class="form-input" name="text" cols="30" rows="10"><?= $text ?></textarea>
								</div>
								<div class="error-container"><?php echo $textError ?></div>
							</div>
							<div class="form-field">
								<span class="form-label">Дата последнего изменения:</span>
								<span><?php echo $latest_edit_date ?></span>
							</div>
							<div class="form-field">
								<span class="form-label">Дата текущего изменения:</span>
								<span><?php echo $current_edit_date ?></span>
							</div>
							<div class="action-panel">
								<input class="submit-btn" type="submit" value="Сохранить" />
							</div>
							<input type="hidden" value="<?= $id ?>" name="id"/>
							<input type="hidden" value="<?= $current_edit_date ?>" name="editDate"/>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>

    <!-- <form method="POST" action="update.php?id=<?= $id ?>">
        Название поста: <input type="text" name="title" required value="<?= $title ?>" /><br />
        Текст: <textarea name="text" cols="30" rows="10" required><?= $text ?></textarea><br />
        Время последнего изменения: <?php echo $latest_edit_date ?><br />
		Время текущего изменения: <?php echo $current_edit_date ?><br />
		<input type="hidden" value="<?= $id ?>" name="id"/>
		<input type="hidden" value="<?= $current_edit_date ?>" name="editDate"/>
        <input type="submit" value="Сохранить" />
    </form> -->
</body>

</html>