// This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
//Isso é para poder ver o gráfico. Estamos usando o Apex Chart. Você pode verificar a documentação dos Gráficos Apex também
var options = {
    series: [{
            name: "Lucro líquido",
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
        },
        {
            name: "entrada bruta",
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
        },
        {
            name: " Fluxo de caixa livre ",
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
        },
    ],
    chart: {
        type: "bar",
        height: 250, // make this 250
        sparkline: {
            enabled: true, // make this true
        },
    },

    xaxis: {
        categories: ["Fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro"],
    },

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "55%",
            endingShape: "rounded",
        },
    },
    /*
      yaxis: {
          title: {
            text: "$ (milhares)",
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          show: true,
          width: 2,
          colors: ["transparent"],
        },
        
        fill: {
          opacity: 1,
        }, */
    tooltip: {
        y: {
            formatter: function(val) {
                return "$ " + val + " milhares";
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#apex1"), options);
chart.render();

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