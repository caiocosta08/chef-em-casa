export function validaEvento(evento){

  let data = evento.data.value
  let titulo = evento.titulo.value
  let local = evento.local.value
  let hora = evento.hora.value

  if(!validTitle(titulo)) return false;
  if(!validPlace(local)) return false;
  if(!validDate(data)) return false;
  if(!validHour(hora)) return false;

}

export function validachef(chef){

  let data = chef.data.value
  let titulo = chef.titulo.value
  let local = chef.local.value
  let hora = chef.hora.value
  let links = chef.linksuteis.value
  let topicos = chef.topicos.value
  let referencias = chef.referencias.value
  let resumo = chef.resumo.value

  if(!validLinks(links)) return false;
  if(!validTopics(topicos)) return false;
  if(!validReferences(referencias)) return false;
  if(!validRes(resumo)) return false;
  if(!validTitle(titulo)) return false;
  if(!validPlace(local)) return false;
  if(!validDate(data)) return false;
  if(!validHour(hora)) return false;
}

export function validLogin(){
  let login = formLogin.login.value
  let senha = formLogin.senha.value

  if((!validUser(login)) || (!validPassword(senha,confirmSenha))) return false;
  else{
    alert('Login efetuado com sucesso!')
    return true
  }
}

export function validNewUser(){
  let login = form1.login.value
  let senha = form1.senha.value
  let confirmSenha = form1.senhaConfirm.value

  if((!validUser(login)) || (!validPassword(senha,senha))) return false;
  else{
    alert('Cadastro efetuado com sucesso!')
    return true
  }
}

export function validUser(user){

  let arrayProibidos = [',','.',':',';','`','´','^','~','[',']','{','}','?','/','*','-','+','=','_','!','@','#','$','%','¨','&','*','(','§',')','|',"'",'"'];
  for(let i=0; i<user.length; i++){
    for(let j=0; j<arrayProibidos.length; j++){
      if(user[i]==arrayProibidos[j]){
        alert('O login não pode conter os seguintes caracteres: ,.:;`´^~[]{}?/*-+=_"' + "'!@#$%¨&*(§)|");
        return false;
      }
    }
  }
  if((user.length<8) || (user=='') || (user==null)){
    alert('O login digitado tem menos de 8 caracteres ou está vazio!');
    return false;
  }
  else return true;
}

export function validPassword(pass,conf){

  let arrayProibidos = [',','.',':',';','`','´','^','~','[',']','{','}','?','/','*','-','+','=','_','!','@','#','$','%','¨','&','*','(','§',')','|',"'",'"'];
  for(let i=0; i<pass.length; i++){
    for(let j=0; j<arrayProibidos.length; j++){
      if(pass[i]==arrayProibidos[j]){
        alert('A senha não pode conter os seguintes caracteres: ,.:;`´^~[]{}?/*-+=_"' + "'!@#$%¨&*(§)|");
        return false;
      }
    }
  }

  if((pass!=conf)||(pass.length<8)||(pass=='')||(pass==null)){
    alert('A senha digitada tem menos de 8 caracteres ou está vazia');
    return false;
  }
  else return true;
}

export function validLinks(links){
}

export function validTopics(topicos){
}

export function validRes(resumo){
}

export function validReferences(referencias){
}

export function validPlace(local){
  if((local == '')||(local == null)||(local.length < 3)){
    alert("Por favor, digite corretamente o local do evento");
     //Foi definido um focus no campo.
    evento.local.focus();
    //o form não é enviado.
    return false;
  }else{
    return true;
  }
}

export function validTitle(titulo){
  if((titulo == '')||(titulo == null)||(titulo.length < 3)){
    alert("Por favor, digite corretamente o titulo do evento");
    //Foi definido um focus no campo.
    evento.titulo.focus();
    //o form não é enviado.
    return false;
  }else{
    return true;
  }
}

export function validHour(hora){
  hora = hora.split(':')
  if((hora[0]=='')||(hora[0]==null)||(hora[0].length < 2)||(hora[1]=='')
  ||(hora[1]==null)||(hora[1].length < 2)||(hora[0] >= 24)||(hora[0] < 0)
  ||(hora[1] >= 60)||(hora[1] < 0)
  ){
    alert('Hora incorreta. Por favor, digite novamente');
    return false;
  }else{
    return true;
  }
}

export function validDate(data){
  data = data.split('/');
  if((data[0]=='')||(data[0]==null)||(data[0].length < 2)||(data[0] < 01)
     ||(data[0] > 31)||(data[1] == '')||(data[1]==null)||(data[1].length < 2)
     ||(data[1] < 01)||(data[1] > 12)||(data[2]=='')||(data[2]==null)
     ||(data[2].length < 4)||(data[2] < 2017)
    ){
    alert('Data incorreta. Por favor, digite novamente.');
    return false;
  }else{
    return true;
  }
}
