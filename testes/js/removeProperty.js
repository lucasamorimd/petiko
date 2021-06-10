// Implemente a função removeProperty, que recebe um objeto e o nome de uma propriedade.

// Faça o seguinte:

// Se o objeto obj tiver uma propriedade prop, a função removerá a propriedade do objeto e retornará true;
// em todos os outros casos, retorna falso.

function removeProperty(obj, prop) {
  if (obj.hasOwnProperty(prop)) {
    delete obj[prop]
    console.log(obj)
    return true
  } else {
    console.log(obj)
    return false
  }

}
removeProperty({ id: '01', nome: 'Lucas', sobrenome: 'Amorim' }, 'endereco') //Essa retornará falso
removeProperty({ id: '01', nome: 'Fulano', sobrenome: 'de Tal', endereco: 'rua 05 casa 10' }, 'endereco')//Neste exemplo retornará true e removerá a propriedade "endereco"