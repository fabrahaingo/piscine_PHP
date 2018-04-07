window.onload = function() {
    if (!document.cookie) {
        var str = document.cookie;
        alert(document.cookie);
        var tab = str.split(";");
        for (var i = 0; tab[i]; i++) {
            var newTodo = document.createElement("div");
            newTodo.addEventListener("click", deleteTodo);
            var newTodoContent = document.createTextNode(tab[i]);
            newTodo.appendChild(newTodoContent);
            ft_list.insertBefore(newTodo, ft_list.firstChild);
            alert("ok");
        }
    }
}

window.onunload = function() {
    var todos = ft_list.children;
    document.cookie = todos.innerHTML;
}

function add_todo() {
    var enterTodo = prompt("What's next ?");
    if (enterTodo) {
        var newTodo = document.createElement("div");
        newTodo.addEventListener("click", deleteTodo);
        var newTodoContent = document.createTextNode(enterTodo);
        newTodo.appendChild(newTodoContent);
        ft_list.insertBefore(newTodo, ft_list.firstChild);
    }
}

function deleteTodo() {
    if (confirm("Have you done this task ?"))
        this.parentNode.removeChild(this);
}
