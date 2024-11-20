console.log("Arquivo JS carregado!");

let produtosArray = []; // Array global para armazenar os produtos
let produtosVisiveis = []; // Array para armazenar os produtos atualmente visíveis

document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM totalmente carregado");

    // Inicializa os produtos
    produtosArray = Array.from(document.getElementsByClassName('product-card'));
    produtosVisiveis = [...produtosArray]; // Preenche produtos visíveis com todos os produtos no início

    console.log("Produtos encontrados: ", produtosArray);

    // Adiciona eventos para os inputs de pesquisa
    const produtoInput = document.getElementById('produtoDigitado');
    const mercadoInput = document.getElementById('mercadoDigitado');

    if (produtoInput && mercadoInput) {
        produtoInput.addEventListener('input', pesquisar);
        mercadoInput.addEventListener('input', pesquisar);
    } else {
        console.log("Campos de input de pesquisa não foram encontrados.");
    }

    organizarProdutos(); // Chama a função de organizar produtos

    // Aplica as estrelas de avaliação inicialmente
    aplicarEventosEstrelas();
});


// FUNÇÃO UTILIZADA PARA AVALIAR MERCADOS
function configurarEstrelas(seletor, hiddenInputId) {
    const estrelas = document.querySelectorAll(seletor);
    const hiddenInput = document.getElementById(hiddenInputId);

    if (estrelas.length > 0 && hiddenInput) {
        console.log("Estrelas encontradas: ", estrelas);
        estrelas.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                hiddenInput.value = value; // Define o valor do input oculto
                console.log("Avaliação clicada: ", value);

                estrelas.forEach(s => {
                    s.classList.remove('fas', 'far');
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.add('fas'); // Adiciona a classe 'fas' para estrelas preenchidas
                    } else {
                        s.classList.add('far'); // Adiciona a classe 'far' para estrelas vazias
                    }
                });
            });
        });
    } else {
        console.log(`Estrelas ou input não encontrados para o seletor: ${seletor} e o hiddenInputId: ${hiddenInputId}`);
    }
}

// Função para reaplicar eventos de avaliação nas estrelas
function aplicarEventosEstrelas() {
    configurarEstrelas('.avaliacaoMercado1 i', 'avaliacao_mercado1');
    configurarEstrelas('.avaliacaoMercado2 i', 'avaliacao_mercado2');
    configurarEstrelas('.avaliacaoMercado3 i', 'avaliacao_mercado3');
    configurarEstrelas('.avaliacaoMercado4 i', 'avaliacao_mercado4');
}


// FUNÇÕES QUE ATUALIZAM A POSIÇÃO DOS PRODUTOS NA PÁGINA

// Função para pesquisar produtos
function pesquisar() {
    const inputProduto = document.getElementById('produtoDigitado').value.toLowerCase();
    const inputMercado = document.getElementById('mercadoDigitado').value.toLowerCase();

    // Filtra os produtos de acordo com a pesquisa
    produtosVisiveis = produtosArray.filter(produto => {
        const produtoNome = produto.getElementsByClassName('product-name')[0].textContent.toLowerCase();
        const mercadoNome = produto.getElementsByClassName('market-name')[0].textContent.toLowerCase();
        return produtoNome.includes(inputProduto) && mercadoNome.includes(inputMercado);
    });

    console.log("Produtos visíveis após pesquisa: ", produtosVisiveis);
    atualizarProdutosContainer(produtosVisiveis); // Atualiza o container com produtos visíveis
}

function organizarProdutos() {
    const select = document.getElementById('ordenacaoSelect'); // Obtém o select
    if (!select) return; // Verifica se o select existe antes de adicionar o evento
    select.addEventListener('change', function () {
        const opcaoSelecionada = this.value;
        console.log("Opção de ordenação selecionada: ", opcaoSelecionada);

        let produtosOrdenados = [...produtosVisiveis]; // Cópia dos produtos visíveis

        produtosOrdenados.sort((a, b) => {
            const priceElementA = a.getElementsByClassName('product-price')[0];
            const priceElementB = b.getElementsByClassName('product-price')[0];
            const dateElementA = a.getElementsByClassName('product-date')[0];
            const dateElementB = b.getElementsByClassName('product-date')[0];
            const quantityElementA = a.querySelector('#product-quantity strong');
            const quantityElementB = b.querySelector('#product-quantity strong');

            // Verifica qual tipo de ordenação foi selecionado
            if (opcaoSelecionada === '1' || opcaoSelecionada === '2') {
                // Ordenação por preço
                if (!priceElementA || !priceElementB) {
                    console.error("Elemento de preço não encontrado:", priceElementA, priceElementB);
                    return 0;
                }

                const precoA = parseFloat(priceElementA.innerText.replace('R$', '').replace('.', '').replace(',', '.').trim());
                const precoB = parseFloat(priceElementB.innerText.replace('R$', '').replace('.', '').replace(',', '.').trim());

                if (isNaN(precoA) || isNaN(precoB)) {
                    console.error("Erro ao converter preços:", precoA, precoB);
                    return 0;
                }

                return opcaoSelecionada === '1' ? precoA - precoB : precoB - precoA;

            } else if (opcaoSelecionada === '3' || opcaoSelecionada === '4') {
                // Ordenação por data
                if (!dateElementA || !dateElementB) {
                    console.error("Elemento de data não encontrado:", dateElementA, dateElementB);
                    return 0;
                }

                const dataRegex = /(\d{2}\/\d{2}\/\d{4} \d{2}:\d{2}:\d{2})/;
                const matchA = dateElementA.innerText.match(dataRegex);
                const matchB = dateElementB.innerText.match(dataRegex);

                const dataA = matchA ? new Date(matchA[0].split('/').reverse().join('-')) : null;
                const dataB = matchB ? new Date(matchB[0].split('/').reverse().join('-')) : null;

                // Tratamento para datas inválidas
                if (!dataA && !dataB) return 0;
                if (!dataA) return opcaoSelecionada === '3' ? 1 : -1;
                if (!dataB) return opcaoSelecionada === '3' ? -1 : 1;

                return opcaoSelecionada === '3' ? dataB - dataA : dataA - dataB;

            } else if (opcaoSelecionada === '5') {
                // Ordenação por número de avaliações
                if (!quantityElementA || !quantityElementB) {
                    console.error("Elemento de quantidade não encontrado:", quantityElementA, quantityElementB);
                    return 0;
                }

                const quantidadeA = parseInt(quantityElementA.innerText.trim(), 10);
                const quantidadeB = parseInt(quantityElementB.innerText.trim(), 10);

                return quantidadeB - quantidadeA;
            }

            return 0;
        });

        // Atualiza o container com os produtos organizados
        atualizarProdutosContainer(produtosOrdenados);
    });
}


// Função para atualizar o container de produtos
function atualizarProdutosContainer(produtos) {
    const produtosContainer = document.getElementById('produtos-container');
    produtosContainer.innerHTML = ''; // Limpa o container

    if (produtos.length === 0) {
        // Exibe uma mensagem caso não haja produtos
        const mensagem = document.createElement('p');
        mensagem.textContent = "Nenhum produto foi encontrado.";
        mensagem.classList.add('mensagem-nenhum-produto'); // Adiciona uma classe para estilização
        produtosContainer.appendChild(mensagem);

        mensagem.style.color = '#8899a6 '; // Cor do texto
        mensagem.style.fontSize = '1.5em';
        mensagem.style.textAlign = 'center';
        return; // Sai da função após exibir a mensagem
    }

    produtos.forEach(produto => {
        const colDiv = document.createElement('div'); // Cria um novo elemento div para a coluna
        colDiv.classList.add('col-lg-4', 'col-md-6', 'mb-4'); // Adiciona classes para estilo
        colDiv.appendChild(produto); // Adiciona o card dentro da nova coluna
        produtosContainer.appendChild(colDiv); // Adiciona a coluna ao container
    });

    // Reaplica os eventos das estrelas após a atualização dos produtos
    aplicarEventosEstrelas();
}

// Função para alternar o estado do coração (preenchido ou vazio)
function toggleHeart(button) {
    var heartEmpty = button.querySelector('.heart-empty');
    var heartFilled = button.querySelector('.heart-filled');

    // Alterna a exibição dos ícones
    if (heartFilled.style.display === 'inline') {
        heartFilled.style.display = 'none';  // Esconde o coração preenchido
        heartEmpty.style.display = 'inline'; // Exibe o coração vazio
    } else {
        heartFilled.style.display = 'inline'; // Exibe o coração preenchido
        heartEmpty.style.display = 'none';    // Esconde o coração vazio
    }
}
