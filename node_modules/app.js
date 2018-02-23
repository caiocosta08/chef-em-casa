/*import 'jquery'
import 'bootstrap'
import 'popper.js'
import 'recaptcha'*/
import {sendLogoutToAnalytics, sendLoginToAnalytics} from 'ana.js'
import {atualizarMensagens, toggleChat, sendMessage, getHora, lerJSON} from 'img.js'
import {
  validaEvento, validaChef, validLogin, validNewUser,validUser,
  validPassword, validLinks, validTopics, validRes, validReferences,
  validPlace, validTitle, validHour, validDate
} from 'validator.js'
import {
  loadChefs, loadSearch, loadChef, editChef, loadCalendar, 
  atualizarChefs, atualizarEventos, searchCalendar, searchChef
} from 'load.js'
import {sendContactChef, toggleLinks} from 'functions.js'

$("#linkChef").click(toggleLinks('chef'));
$("#linkEvento").click(toggleLinks('event'));
loadChef()
loadChefs()
atualizarChefs()
atualizarEventos()
loadCalendar()
searchCalendar()
searchChef()
editChef()
$("#btnLogin").click(sendLoginToAnalytics())
$("#btnLogout").click(sendLogoutToAnalytics())
$("input#login.form-control").blur()//tirar foco do input para ir para o topo
$("input#senha.form-control").blur()
window.scrollTo(0,0)//ir para o topo
lerJSON()
atualizarMensagens()
toggleChat()