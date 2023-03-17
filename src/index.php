<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>

  <link href="./light-theme.css" rel="stylesheet" />
  <link href="./dark-theme.css" rel="stylesheet" />
</head>

<body>
  <main class="app">
    <header class="app__header">
      <h1>Todo List</h1>
      <button class="app__header--toggle-theme" onclick="toggleTheme()">Dark</button>
    </header>
    <section class="app__content">
      <form class="app__content--form" onsubmit="return handleSubmit(event);">
        <input class="app__content--task-title" placeholder="Escreva aqui..." />
        <button class="app__content--task-button" type="submit">Enviar</button>
      </form>
      <ul class="app__content--list"></ul>
    </section>
  </main>

  <script>
    const todoList = [];
    let lastId = 1;

    function removeTask(todoToRemove) {
      const todoIndex = todoList.findIndex(todo => todo.id === todoToRemove.id);
      todoList.splice(todoIndex, 1);
      updateList();
    }

    function updateList() {
      const listEl = document.querySelector('.app__content--list');
      listEl.textContent = "";

      todoList.forEach((todo, index) => {
        const itemEl = document.createElement('li');

        const textEl = document.createElement('span');
        textEl.className = 'app__content--todo-title';
        textEl.textContent = '#' + todo.id + ' - ' + todo.text;

        const removeEl = document.createElement('span');
        removeEl.className = 'app__content--todo-remove-button';
        removeEl.textContent = '  X  ';
        removeEl.ariaRoleDescription = 'button';
        removeEl.addEventListener('click', () => {
          removeTask(todo);
        });

        itemEl.appendChild(textEl);
        itemEl.appendChild(removeEl);

        listEl.appendChild(itemEl);
      });
    }

    function addTask(text) {
      todoList.push({
        id: lastId++,
        text,
      });
      updateList();
    }

    function handleSubmit(event) {
      event.preventDefault();
      const inputEl = event.target.querySelector('input');
      const text = inputEl.value.trim();
      if (text) {
        addTask(text);
        inputEl.value = '';
      } else {
        alert('Por favor, preencha o título da sua Todo!');
      }
      inputEl.focus();
    }

    function toggleTheme() {
      const darkThemeClass = 'dark-mode';
      const toggleEl = document.querySelector('.app__header--toggle-theme');
      if (document.body.classList.contains(darkThemeClass)) {
        document.body.classList.remove(darkThemeClass);
        toggleEl.textContent = 'Dark';
      } else {
        document.body.classList.add(darkThemeClass);
        toggleEl.textContent = 'Light';
      }
    }
  </script>
</body>

</html>
