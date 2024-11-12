document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM totalmente carregado");

    var savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        doDemo(); // Passa para o tema escuro
    }


}
);
function doDemo(button) {
    var body = document.body;
    var produtosCard = document.getElementsByClassName("product-card");
    var marketNames = document.getElementsByClassName("market-name");
    var productNames = document.getElementsByClassName("product-name");
    var mercadosDetails = document.getElementsByClassName("market-details");
    var produtosHome = document.getElementById("produtos-home");
    var produtosPesquisa = document.getElementById("produtos-pesquisa");
    var dashboardContainer = document.getElementsByClassName("data-card");
    var sidebar = document.getElementsByClassName("sidebar");
    var cadastroContainer = document.getElementById("cadastro-container");
    var inputElements = document.getElementsByTagName("input");
    var inputElementsText = document.querySelectorAll("input[type='email'], input[type='password'], input[type='text']");
    var selectElements = document.getElementsByTagName("select");
    var loginregisterElements = document.getElementsByClassName("main-container");
    var close = document.getElementsByClassName("close");
    var logoutElements = document.getElementsByClassName("logout-container");
    var welcomeAlert = document.querySelector(".alert-success"); // Alerta de boas-vindas
    var loginAlert = document.querySelector(".alert-danger"); // Alerta de não logado
    var modalContent = document.getElementsByClassName("modal-content"); // Captura os conteúdos do modal
    var favoritosContent = document.getElementsByClassName("alert alert-info"); // Captura os conteúdos do modal
    var cardElements = document.querySelectorAll(".card.text-left.h-100"); // Seleciona todos os cards
    var sectionTitle = document.querySelector(".section-title");


    // Verifica se o tema atual é escuro e alterna
    if (body.style.backgroundColor === "rgb(30, 30, 30)" || body.style.backgroundColor === "black") {
        // Tema claro
        body.style.backgroundColor = "white";
        body.style.color = "black";

        for (var i = 0; i < produtosCard.length; i++) {
            produtosCard[i].style.backgroundColor = "#e0e0e0";
            produtosCard[i].style.color = "black";
        }

        for (var i = 0; i < cardElements.length; i++) {
            cardElements[i].style.backgroundColor = "#e0e0e0"; // Fundo claro para os cards
            cardElements[i].style.color = "black"; // Texto escuro
        }

        for (var i = 0; i < marketNames.length; i++) {
            marketNames[i].style.color = "#343a40";
        }

        for (var i = 0; i < productNames.length; i++) {
            productNames[i].style.color = "#343a40";
        }

        for (var i = 0; i < mercadosDetails.length; i++) {
            mercadosDetails[i].style.backgroundColor = "#f8f9fa";
        }

        for (var i = 0; i < loginregisterElements.length; i++) {
            loginregisterElements[i].style.backgroundColor = "#f8f9fa";
        }

        for (var i = 0; i < close.length; i++) {
            close[i].style.backgroundColor = "#f8f9fa";
        }

        for (var i = 0; i < logoutElements.length; i++) {
            logoutElements[i].style.backgroundColor = "#f8f9fa";
        }

        if (produtosHome) produtosHome.style.backgroundColor = "#f8f9fa";
        if (produtosPesquisa) produtosPesquisa.style.backgroundColor = "#f8f9fa";

        for (var i = 0; i < dashboardContainer.length; i++) {
            dashboardContainer[i].style.backgroundColor = "#f8f9fa";
            dashboardContainer[i].style.color = "#343a40";
            var dashboardTextElements = dashboardContainer[i].getElementsByTagName("*");
            for (var j = 0; j < dashboardTextElements.length; j++) {
                dashboardTextElements[j].style.color = "#343a40";
            }
        }

        for (var i = 0; i < sidebar.length; i++) {
            sidebar[i].style.backgroundColor = "#f8f9fa";
            sidebar[i].style.color = "#343a40";
            var sidebarTextElements = sidebar[i].getElementsByTagName("*");
            for (var j = 0; j < sidebarTextElements.length; j++) {
                sidebarTextElements[j].style.color = "#343a40";
            }
        }

        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].style.backgroundColor = "white";
            inputElements[i].style.color = "#343a40";
            inputElements[i].style.borderColor = "#343a40";
        }

        for (var i = 0; i < inputElementsText.length; i++) {

            inputElementsText[i].classList.remove("placeholder-dark");
            inputElementsText[i].classList.add("placeholder-light");
        }

        for (var i = 0; i < selectElements.length; i++) {
            selectElements[i].style.backgroundColor = "white";
            selectElements[i].style.color = "#343a40";
            selectElements[i].style.borderColor = "#343a40";
        }

        if (cadastroContainer) {
            cadastroContainer.style.backgroundColor = "#f8f9fa";
            cadastroContainer.style.color = "#343a40";

            var cadastroTextElements = cadastroContainer.getElementsByTagName("label");
            for (var i = 0; i < cadastroTextElements.length; i++) {
                cadastroTextElements[i].style.color = "#343a40";
            }
        }

        // Estilo para o alerta de boas-vindas
        if (welcomeAlert) {
            welcomeAlert.style.backgroundColor = "#d4edda"; // Fundo claro
            welcomeAlert.style.color = "#155724"; // Texto escuro
        }

        // Estilo para o alerta de não logado
        if (loginAlert) {
            loginAlert.style.backgroundColor = "#f8d7da"; // Fundo claro
            loginAlert.style.color = "#721c24"; // Texto escuro
        }

        // Estilo para o conteúdo do modal
        for (var i = 0; i < modalContent.length; i++) {
            modalContent[i].style.backgroundColor = "#ffffff"; // Fundo claro
            modalContent[i].style.color = "#343a40"; // Texto escuro
        }


        for (var i = 0; i < favoritosContent.length; i++) {
            favoritosContent[i].style.backgroundColor = "#E0FFFF"; // Fundo claro
            favoritosContent[i].style.color = "#343a40"; // Texto escuro
        }
        
        if (sectionTitle) {
            sectionTitle.style.color = "#343a40"; // Cor do texto no tema claro
        }
        
        localStorage.setItem("theme", "light");
    } else {
        // Tema escuro
        body.style.backgroundColor = "#1e1e1e";
        body.style.color = "#ffffff"; // Texto branco para o body

        for (var i = 0; i < produtosCard.length; i++) {
            produtosCard[i].style.backgroundColor = "#343a40";
            produtosCard[i].style.color = "#ffffff"; // Texto branco nos cartões
        }

        for (var i = 0; i < cardElements.length; i++) {
            cardElements[i].style.backgroundColor = "#343a40"; // Fundo escuro para os cards
            cardElements[i].style.color = "#ffffff"; // Texto branco
        }

        for (var i = 0; i < marketNames.length; i++) {
            marketNames[i].style.color = "#ffffff"; // Texto branco nos nomes de mercado
        }

        for (var i = 0; i < productNames.length; i++) {
            productNames[i].style.color = "#ffffff"; // Texto branco nos nomes de produtos
        }

        for (var i = 0; i < mercadosDetails.length; i++) {
            mercadosDetails[i].style.backgroundColor = "#343a40"; // Fundo escuro nos detalhes dos mercados
        }

        for (var i = 0; i < loginregisterElements.length; i++) {
            loginregisterElements[i].style.backgroundColor = "#343a40"; // Fundo escuro nos detalhes do login e do register
        }

        for (var i = 0; i < close.length; i++) {
            close[i].style.backgroundColor = "#343a40"; // Fundo escuro nos detalhes do botao close
        }

        for (var i = 0; i < logoutElements.length; i++) {
            logoutElements[i].style.backgroundColor = "#343a40"; // Fundo escuro nos detalhes do logout
        }

        if (produtosHome) produtosHome.style.backgroundColor = "#343a40"; // Fundo escuro
        if (produtosPesquisa) produtosPesquisa.style.backgroundColor = "#343a40"; // Fundo escuro

        for (var i = 0; i < dashboardContainer.length; i++) {
            dashboardContainer[i].style.backgroundColor = "#343a40"; // Fundo escuro no dashboard
            dashboardContainer[i].style.color = "#ffffff"; // Texto branco no dashboard
            var dashboardTextElements = dashboardContainer[i].getElementsByTagName("*");
            for (var j = 0; j < dashboardTextElements.length; j++) {
                dashboardTextElements[j].style.color = "#ffffff"; // Texto branco
            }
        }

        for (var i = 0; i < sidebar.length; i++) {
            sidebar[i].style.backgroundColor = "#343a40"; // Fundo escuro na sidebar
            sidebar[i].style.color = "#ffffff"; // Texto branco na sidebar
            var sidebarTextElements = sidebar[i].getElementsByTagName("*");
            for (var j = 0; j < sidebarTextElements.length; j++) {
                sidebarTextElements[j].style.color = "#ffffff"; // Texto branco
            }
        }

        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].style.backgroundColor = "#2c2c2c"; // Fundo escuro
            inputElements[i].style.color = "#ffffff"; // Texto branco
            inputElements[i].style.borderColor = "#ffffff"; // Borda clara
            inputElements[i].style.setProperty('--placeholder-color', '#ffffff'); // Define a cor do placeholder
        }

        for (var i = 0; i < inputElementsText.length; i++) {
            inputElementsText[i].classList.remove("placeholder-light");
            inputElementsText[i].classList.add("placeholder-dark");
        }

        for (var i = 0; i < selectElements.length; i++) {
            selectElements[i].style.backgroundColor = "#2c2c2c"; // Fundo escuro
            selectElements[i].style.color = "#ffffff"; // Texto branco
            selectElements[i].style.borderColor = "#ffffff"; // Borda clara
            selectElements[i].style.setProperty('--placeholder-color', '#ffffff'); // Define a cor do placeholder

        }

        if (cadastroContainer) {
            cadastroContainer.style.backgroundColor = "#343a40"; // Fundo escuro no cadastro
            cadastroContainer.style.color = "#ffffff"; // Texto branco

            var cadastroTextElements = cadastroContainer.getElementsByTagName("label");
            for (var i = 0; i < cadastroTextElements.length; i++) {
                cadastroTextElements[i].style.color = "#ffffff"; // Texto branco nos rótulos
            }
        }

        // Estilo para o alerta de boas-vindas no tema escuro
        if (welcomeAlert) {
            welcomeAlert.style.backgroundColor = "#155724"; // Fundo mais escuro
            welcomeAlert.style.color = "#ffffff"; // Texto branco
        }

        // Estilo para o alerta de não logado no tema escuro
        if (loginAlert) {
            loginAlert.style.backgroundColor = "#721c24"; // Fundo mais escuro
            loginAlert.style.color = "#ffffff"; // Texto branco
        }

        // Estilo para o conteúdo do modal no tema escuro
        for (var i = 0; i < modalContent.length; i++) {
            modalContent[i].style.backgroundColor = "#343a40"; // Fundo escuro
            modalContent[i].style.color = "#ffffff"; // Texto branco
        }
        var allElements = body.getElementsByTagName("*");
        for (var i = 0; i < allElements.length; i++) {
            allElements[i].style.color = "#ffffff"; // Texto branco
        }

        // Estilo para o conteúdo do favoritos
        for (var i = 0; i < favoritosContent.length; i++) {
            favoritosContent[i].style.backgroundColor = "#2c2c2c"; // Fundo escuro
            favoritosContent[i].style.color = "#ffffff"; // Texto branco
        }

        if (sectionTitle) {
            sectionTitle.style.color = "#ffffff"; // Cor do texto no tema escuro
        }

        localStorage.setItem("theme", "dark");
    }
}
