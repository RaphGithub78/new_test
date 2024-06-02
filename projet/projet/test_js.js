document.getElementById('toggleBtn').addEventListener('click', function() {
    var taskbar = document.getElementById('taskbar');
    if (taskbar.style.display === 'none' || taskbar.style.display === '') {
        taskbar.style.display = 'block';
    } else {
        taskbar.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var taskList = document.getElementById('taskList');

    // Fonction pour ajouter un champ à la barre des tâches
    function addTask() {
        var taskName = prompt("Entrez le nom de la tâche :");
        if (taskName) {
            var li = document.createElement('li');
            li.textContent = taskName;
            taskList.appendChild(li);
        }
    }

    // Ajoutez un champ par défaut lors du chargement de la page
    addTask();

    // Ajoutez un champ lorsque l'utilisateur clique sur la barre des tâches
    taskList.addEventListener('click', addTask);
});
