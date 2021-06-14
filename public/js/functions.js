function cadastrarCliente() {
    var nome = document.getElementById('nome')
    var email = document.getElementById('email')
    if (nome.value && email.value) {
        var form = document.getElementById('formCliente');
        form.submit();
    } else {
        if (!nome.value && !email.value) {
            showErrorNome()
            showErrorEmail()
        } else {
            if (!nome.value) {
                showErrorNome()
            }
            if (!email.value) {
                showErrorEmail()
            }
        }
    }
}
function showErrorNome() {
    var validate = document.createElement('div');
    var validateNome = document.getElementById('validateNome');
    validate.classList.add('alert')
    validate.classList.add('alert-danger')
    validate.innerHTML = 'Nome não inserido, favor colocar um nome'
    validateNome.appendChild(validate)
}
function showErrorEmail() {
    var validate = document.createElement('div');
    var validateNome = document.getElementById('validateEmail');
    validate.classList.add('alert')
    validate.classList.add('alert-danger')
    validate.innerHTML = 'Email não inserido, favor colocar um nome'
    validateNome.appendChild(validate)
}

function teste() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var cep = document.getElementById('CEP').value
    if (cep.length == 8) {
        $.ajax({
            type: "post",
            url: '/pedidos-ajax',
            data: { cep: cep },
            dataType: 'json',
            success: function (resultado) {
                if (resultado.viacep.erro && resultado.postmon === null) {
                    var validate = document.createElement('div');
                    var validateNome = document.getElementById('validateCEP');
                    validate.setAttribute('id', 'alertaErroCep');
                    validate.classList.add('alert')
                    validate.classList.add('alert-danger')
                    validate.innerHTML = 'Cep incorreto, favor verificar e informar um cep correto!'
                    validateNome.appendChild(validate)

                    var cidade = document.getElementById('Cidade');
                    var estado = document.getElementById('Estado');
                    var endereco = document.getElementById('Endereco');
                    var bairro = document.getElementById('Bairro');
                    var uf = document.getElementById('UF');
                    cidade.value = ''
                    estado.value = ''
                    endereco.value = ''
                    bairro.value = ''
                    uf.value = ''

                } else {
                    var cepErro = document.getElementById('alertaErroCep')
                    if (cepErro) {
                        cepErro.remove();
                    }
                    if (resultado.viacep.erro && resultado.postmon != null) {
                        apiPostmon(resultado.postmon)
                    } else {
                        viaCep(resultado.viacep)
                    }
                }
            }
        })
    }
}

function viaCep(data) {
    var cidade = document.getElementById('Cidade');
    var estado = document.getElementById('Estado');
    var endereco = document.getElementById('Endereco');
    var bairro = document.getElementById('Bairro');
    var uf = document.getElementById('UF');
    cidade.value = data.localidade
    estado.value = data.uf
    endereco.value = data.logradouro
    bairro.value = data.bairro
    uf.value = data.uf
}
function apiPostmon(data) {
    var cidade = document.getElementById('Cidade');
    var estado = document.getElementById('Estado');
    var endereco = document.getElementById('Endereco');
    var bairro = document.getElementById('Bairro');
    var uf = document.getElementById('UF');
    cidade.value = data.cidade
    estado.value = data.estado_info['nome']
    endereco.value = data.logradouro
    bairro.value = data.bairro
    uf.value = data.estado
}