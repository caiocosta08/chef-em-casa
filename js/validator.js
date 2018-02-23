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

export function validaChef(chef){

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

  var reg = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/

  if(str.search(reg) == 0){
    alert('Data incorreta. Por favor, digite novamente.');
    return false;
  }else{
    return true;
  }
}
