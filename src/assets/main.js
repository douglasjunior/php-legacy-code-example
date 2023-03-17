const DARK_THEME_CLASS_NAME = 'dark-mode';
const TODO_LIST = [];
let LAST_ID = 1;

function removeTask(todoToRemove) {
  const todoIndex = TODO_LIST.findIndex(todo => todo.id === todoToRemove.id);
  TODO_LIST.splice(todoIndex, 1);
  updateList();
}

function updateList() {
  const listEl = document.querySelector('.app__content--list');
  listEl.textContent = "";

  TODO_LIST.forEach((todo, index) => {
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
  TODO_LIST.push({
    id: LAST_ID++,
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

function isInDarkMode() {
  return document.body.classList.contains(DARK_THEME_CLASS_NAME);
}

function updateToggleButton() {
  const toggleEl = document.querySelector('.app__header--toggle-theme');
  if (isInDarkMode()) {
    toggleEl.textContent = 'Light';
  } else {
    toggleEl.textContent = 'Dark';
  }
}

function toggleTheme() {
  if (isInDarkMode()) {
    document.body.classList.remove(DARK_THEME_CLASS_NAME);
  } else {
    document.body.classList.add(DARK_THEME_CLASS_NAME);
  }
  
  updateToggleButton();
}

function main() {
  const browserDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

  if (browserDarkMode) {
    toggleTheme();
  }
}

main();
