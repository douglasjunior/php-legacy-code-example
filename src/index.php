<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>

  <link href="./assets/light-theme.css" rel="stylesheet" />
  <link href="./assets/dark-theme.css" rel="stylesheet" />
</head>

<body class="dark-mode">
  <main class="app">
    <?php include_once('./components/header.php') ?>
    <section class="app__content">
      <?php include_once('./components/form.php') ?>
      <?php include_once('./components/list.php') ?>
    </section>
  </main>

  <script src="./assets/main.js"></script>
</body>

</html>
