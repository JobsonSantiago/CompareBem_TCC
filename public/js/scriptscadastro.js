//FUNÇÕES UTILIZADAS PARA CADASTRO DE PREÇO DOS PRODUTOS
function showImageMarket() {
    const select = document.getElementById("market-select");
    const selectedOption = select.options[select.selectedIndex];
    const imageSrc = selectedOption.getAttribute("data-image");
    const imageElement = document.getElementById("selected-image-market");

    if (imageSrc) {
        imageElement.src = imageSrc;
        imageElement.style.display = "block";
    } else {
        imageElement.style.display = "none";
    }
}

function selectMarket() {
    const select = document.getElementById("market-select");
    const selectedOption = select.options[select.selectedIndex];

    const selectedMarketName = selectedOption.value; // Nome do mercado
    const selectedMarketId = selectedOption.getAttribute("data-id"); // ID do mercado

    const hiddenNameInput = document.getElementById("selected-market-name");
    const hiddenIdInput = document.getElementById("selected-market-id");

    // Define o nome e o ID do mercado nos campos
    hiddenNameInput.value = selectedMarketName;
    hiddenIdInput.value = selectedMarketId;

    // Fecha o modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('myModal1'));
    modal.hide();
}

const products = [
    { name: 'Arroz - Camil', id: 1, image: 'images/pr_arroz.png' },
    { name: 'Arroz - Tio João', id: 2, image: 'images/pr_arroz2.png' },
    { name: 'Feijão - Camil', id: 3, image: 'images/pr_feijao.png' },
    { name: 'Feijão - Kicaldo', id: 4, image: 'images/pr_feijao2.png' },
    { name: 'Açúcar - União', id: 5, image: 'images/pr_acucar.png' },
    { name: 'Açúcar - Caravelas', id: 6, image: 'images/pr_acucar2.png' },
    { name: 'Sal - Cisne', id: 7, image: 'images/pr_sal.png' },
    { name: 'Sal - Lebre', id: 8, image: 'images/pr_sal2.png' },
    { name: 'Café - Pilão', id: 9, image: 'images/pr_cafe.png' },
    { name: 'Café - União', id: 10, image: 'images/pr_cafe2.png' },
    { name: 'Macarrão - Galo', id: 11, image: 'images/pr_macarrao.png' },
    { name: 'Macarrão - Adria', id: 12, image: 'images/pr_macarrao2.png' },
    { name: 'Farinha de Trigo - Dona Benta', id: 13, image: 'images/pr_farinhadetrigo.png' },
    { name: 'Farinha de Trigo - Qualitá', id: 14, image: 'images/pr_farinhadetrigo2.png' },
    { name: 'Farinha Temperada - Yoki', id: 15, image: 'images/pr_farinhatemperada.png' },
    { name: 'Farinha Temperada - Kodilar', id: 16, image: 'images/pr_farinhatemperada2.png' },
    { name: 'Achocolatado em Pó - Italac', id: 17, image: 'images/pr_achocolatado.png' },
    { name: 'Achocolatado em Pó - Toddy', id: 18, image: 'images/pr_achocolatado2.png' },
    { name: 'Óleo - Soya', id: 19, image: 'images/pr_oleo.png' },
    { name: 'Óleo - Liza', id: 20, image: 'images/pr_oleo2.png' },
    { name: 'Creme de Leite - Italac', id: 21, image: 'images/pr_cremedeleite.png' },
    { name: 'Creme de Leite - Nestlé', id: 22, image: 'images/pr_cremedeleite2.png' },
    { name: 'Molho de Tomate - Quero', id: 23, image: 'images/pr_molhodetomate.png' },
    { name: 'Molho de Tomate - Fugini', id: 24, image: 'images/pr_molhodetomate2.png' },
    { name: 'Bolacha (Cream Cracker) - Adria', id: 25, image: 'images/pr_bolacha.png' },
    { name: 'Bolacha (Cream Cracker) - Bauduco', id: 26, image: 'images/pr_bolacha2.png' },
    { name: 'Leite Condensado - Piracanjuba', id: 27, image: 'images/pr_leitecondensado.png' },
    { name: 'Leite Condensado - Italac', id: 28, image: 'images/pr_leitecondensado2.png' },
    { name: 'Sabonete - Dove', id: 29, image: 'images/pr_sabonete.png' },
    { name: 'Sabonete - Lux', id: 30, image: 'images/pr_sabonete2.png' },
    { name: 'Pasta de Dente - Colgate', id: 31, image: 'images/pr_pastadente.png' },
    { name: 'Pasta de Dente - Sorriso', id: 32, image: 'images/pr_pastadente2.png' },
    { name: 'Papel Higiênico - Sublime', id: 33, image: 'images/pr_papelhigienico.png' },
    { name: 'Papel Higiênico - Personal', id: 34, image: 'images/pr_papelhigienico2.png' },
    { name: 'Leite - Italac', id: 35, image: 'images/pr_leite.png' },
    { name: 'Leite - Piracanjuba', id: 36, image: 'images/pr_leite2.png' },
    { name: 'Refresco em Pó - Tang', id: 37, image: 'images/pr_suco1.png' },
    { name: 'Refresco em Pó - Mid', id: 38, image: 'images/pr_sucoMID1.png' },
    { name: 'Detergente - Limpol', id: 39, image: 'images/pr_detergente.png' },
    { name: 'Detergente - Ypê', id: 40, image: 'images/pr_detergente2.png' },
    { name: 'Sabão em Pó - Ypê', id: 41, image: 'images/pr_sabaoempo.png' },
    { name: 'Sabão em Pó - Omo', id: 42, image: 'images/pr_sabaoempo2.png' },
    { name: 'Esponja de Aço - Bombril', id: 43, image: 'images/pr_esponjadeaco.png' },
    { name: 'Esponja de Aço - Assolan', id: 44, image: 'images/pr_esponjadeaco2.png' }
];


function filterProducts() {
    const input = document.getElementById('product-input').value.toLowerCase();
    const suggestions = document.getElementById('suggestions');
    suggestions.innerHTML = ''; // Limpa sugestões anteriores

    if (input) {
        const filteredProducts = products.filter(product => product.name.toLowerCase().includes(input));

        filteredProducts.forEach(product => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = product.name;
            listItem.onclick = () => selectProduct(product); // Chama selectProduct ao clicar na sugestão
            suggestions.appendChild(listItem);
        });

        if (filteredProducts.length > 0) {
            suggestions.style.display = 'block'; // Mostra sugestões
        } else {
            suggestions.style.display = 'none'; // Esconde sugestões
        }
    } else {
        suggestions.style.display = 'none'; // Esconde sugestões se o input estiver vazio
    }
}

function selectProduct(product) {
    // Atualiza o campo de entrada com o nome do produto
    document.getElementById('product-input').value = product.name;
    // Esconde a lista de sugestões
    document.getElementById('suggestions').style.display = 'none';
    // Atualiza a imagem do produto
    const selectedImage = document.getElementById('selected-image');
    selectedImage.src = product.image;
    selectedImage.style.display = 'block'; // Mostra a imagem

    // Definindo valores ocultos
    document.getElementById("selected-product-name").value = product.name;
    document.getElementById("selected-product-id").value = product.id;

    // Verifica se o modal está sendo fechado corretamente
    const modal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
    modal.hide();
}

