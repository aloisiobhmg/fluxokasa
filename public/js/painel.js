// This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
//Isso é para poder ver o gráfico. Estamos usando o Apex Chart. Você pode verificar a documentação dos Gráficos Apex também


// Códigos de alternância da barra lateral;

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");
var sidebarCloseIcon = document.getElementById("sidebarIcon");

function toggleSidebar() {
    if (!sidebarOpen) {
        alert("Open")
        sidebar.classList.add("sidebar_responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    alert("close")
    if (sidebarOpen) {
        sidebar.classList.remove("sidebar_responsive");
        sidebarOpen = false;
    }
}