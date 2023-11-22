function carregarEstados() {
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
        .then(response => response.json())
        .then(data => {
            const estadoSelect = document.getElementById('estado');
            data.forEach(({ id, nome }) => {
                const option = document.createElement('option');
                option.value = nome; // Usando o nome como valor
                option.textContent = nome;
                // Armazenar o ID como um atributo personalizado no option
                option.dataset.estadoId = id;
                estadoSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Erro ao obter estados:', error));
}

function selecionarEstado() {
    const estadoSelect = document.getElementById('estado');
    const estadoIdInput = document.getElementById('estadoId');

    // Obter o ID do estado selecionado a partir do atributo de dados
    const estadoId = estadoSelect.options[estadoSelect.selectedIndex].dataset.estadoId;

    // Atualizar o campo oculto com o ID do estado
    estadoIdInput.value = estadoId;

    // Chamar a função carregarCidades com o ID do estado
    carregarCidades(estadoId);
}

function carregarCidades(estadoId) {
    const cidadeSelect = document.getElementById('cidade');

    // Limpa as opções atuais
    cidadeSelect.innerHTML = '<option value="" selected disabled>Carregando...</option>';

    // Verificar se o estadoId é válido antes de fazer a requisição
    if (estadoId) {
        // Obter as cidades usando o código do estado
        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios`)
            .then(response => response.json())
            .then(data => {
                // Atualiza as opções da cidade
                cidadeSelect.innerHTML = '<option value="" selected disabled>Selecione uma cidade</option>';
                data.forEach(({ nome }) => {
                    const option = document.createElement('option');
                    option.value = nome; // Usando o nome como valor
                    option.textContent = nome;
                    cidadeSelect.appendChild(option);
                });

                // Habilita o dropdown da cidade
                cidadeSelect.removeAttribute('disabled');
            })
            .catch(error => console.error('Erro ao obter cidades:', error));
    }
}

// Adicionar evento de mudança ao carregar a página
window.onload = function() {
    carregarEstados();
};




function validarFormulario() {
    // Resetar mensagens de erro
    resetarMensagensErro();

    // Validar campos
    if (!validarCampo('nome')) return false;
    if (!validarCampo('especie')) return false;
    if (!validarCampo('sexo')) return false;
    if (!validarCampo('idade')) return false;
    if (!validarCampo('porte')) return false;
    if (!validarCampo('estado')) return false;
    if (!validarCampo('cidade')) return false;
    // Adicione mais campos conforme necessário

    return true;
}

function validarCampo(campo) {
    var valor = document.getElementById(campo).value.trim();
    var errorElement = document.getElementById(campo + 'Error');

    if (valor === '') {
        errorElement.textContent = 'Preencha  ' + obterNomeCampo(campo);
        return false;
    }

    return true;
}

function obterNomeCampo(campo) {
    // Converte o nome do campo para uma versão mais amigável (opcional)
    var nomeCampo = campo.charAt(0).toUpperCase() + campo.slice(1);
    return nomeCampo.replace(/([A-Z])/g, ' $1').trim(); // Adiciona espaços antes de letras maiúsculas
}

function resetarMensagensErro() {
    var errorElements = document.getElementsByClassName('error-message');
    for (var i = 0; i < errorElements.length; i++) {
        errorElements[i].textContent = '';
    }
}