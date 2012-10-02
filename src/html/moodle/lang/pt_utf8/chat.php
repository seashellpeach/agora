<?PHP // $Id$ 
      // chat.php - created with Moodle 2.0 dev (2007101507)


$string['beep'] = 'chamar';
$string['chat:chat'] = 'Conversar num chat';
$string['chat:deletelog'] = 'Apagar as gravações do chat';
$string['chat:readlog'] = 'Ler as gravações do chat';
$string['chatintro'] = 'Texto introdutório';
$string['chatname'] = 'Nome da sala de chat';
$string['chatreport'] = 'Sessão de chat';
$string['chattime'] = 'Próxima sessão de chat';
$string['configmethod'] = 'O método normal do chat precisa que os clientes contactem regularmente o servidor para obter actualizações. Não precisa de nenhuma configuração e funciona em qualquer parte, mas poderá sobrecarregar um servidor que tenha muitas pessoas no chat. A utilização dum daemon no servidor precisa de acesso via shell de Unix, mas o resultado é um ambiente de chat mais rápido e que escala melhor.';
$string['confignormalupdatemode'] = 'Normalmente, as actualizações da sala de chat são feitas em forma eficiente usando o comando <em>Keep-Alive</em> do HTTP 1.1, mas esse método impõe uma carga grande no servidor. Um método mais avançado consite em usar a estratégia de  <em>Stream</em> para enviar actualizações para os utilizadores. A utilização do <em>Stream</em> tem uma escalabilidade melhor (semelhante à do método chat) mas o seu servidor poderá não ter suporte para esse método.';
$string['configoldping'] = 'Depois de quanto tempo de não receber resposta de um utilizador será considerado ausente?';
$string['configrefreshroom'] = 'Com quê frequência (segundos) deverá ser actualizada a sala de chat? Um valor muito baixo fará com que a resposta da sala de chat seja mais rápida, mais vai impor uma carga mais pesada no seu servidor web, quando muitas pessoas estiverem a participar';
$string['configrefreshuserlist'] = 'Com quê frequência deverá ser actualizada a lista de utilizadores? (em segundos)';
$string['configserverhost'] = 'O nome do computador onde se encontra o servidor.';
$string['configserverip'] = 'O número IP do servidor acima.';
$string['configservermax'] = 'Número máximo de participantes permitido';
$string['configserverport'] = 'Porta IP usada pelo programa servidor';
$string['currentchats'] = 'Sessões de chat activas';
$string['currentusers'] = 'Utilizadores actuais';
$string['deletesession'] = 'Apagar esta sessão';
$string['deletesessionsure'] = 'Tem a certeza que deseja apagar esta sessão?';
$string['donotusechattime'] = 'Não publicite horas de chat';
$string['enterchat'] = 'Clique aqui para entrar no chat';
$string['errornousers'] = 'Não encontrei nenhum utilizador!';
$string['explaingeneralconfig'] = 'Estas configurações estão <strong>sempre</strong> activas.';
$string['explainmethoddaemon'] = 'Estas configurações serão relevantes <strong>unicamente</strong> se tiver seleccionado \"Servidor de Chat\" na variável chat_method';
$string['explainmethodnormal'] = 'Estas configurações erão relevantes <strong>unicamente</strong> se tiver seleccionado o \"Método Normal\" na variável chat_method';
$string['generalconfig'] = 'Configureação geral';
$string['helpchatting'] = 'Ajuda com o chat';
$string['idle'] = 'Parado';
$string['messagebeepseveryone'] = '$a chama toda a gente!';
$string['messagebeepsyou'] = '$a acabou de o chamar!';
$string['messageenter'] = '$a acabou de entrar neste chat';
$string['messageexit'] = '$a acabou de sair deste chat';
$string['messages'] = 'Mensagens';
$string['method'] = 'Método do Chat';
$string['methoddaemon'] = 'Servidor de Chat';
$string['methodnormal'] = 'Método Normal';
$string['modulename'] = 'Chat';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Nunca apague mensagens';
$string['nextsession'] = 'Próxima sessão calendarizada';
$string['noguests'] = 'A sala de chat não está aberta a visitantes.';
$string['nomessages'] = 'Não tem mensagens';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Nenhuma sessão marcada';
$string['oldping'] = 'Tempo morto para fim da ligação';
$string['pastchats'] = 'Sessões de chat anteriores';
$string['refreshroom'] = 'Refrescar sala';
$string['refreshuserlist'] = 'Refrescar lista de utilizadores';
$string['removemessages'] = 'Retirar todas as mensagens';
$string['repeatdaily'] = 'Todos os dias à mesma hora';
$string['repeatnone'] = 'Sem repetições - Publique apenas o tempo especificado';
$string['repeattimes'] = 'Repetir sessões';
$string['repeatweekly'] = 'Todas as semanas à mesma hora';
$string['savemessages'] = 'Gravar sessões anteriores';
$string['seesession'] = 'Ver esta sessão';
$string['serverhost'] = 'Nome do servidor';
$string['serverip'] = 'IP do servidor';
$string['servermax'] = 'Núm. Máx. utilizadores';
$string['serverport'] = 'Porta do servidor';
$string['sessions'] = 'Sessões de chat';
$string['strftimemessage'] = '%%H:%%M';
$string['studentseereports'] = 'Toda a gente poderá visualizar sessões passadas';
$string['updatemethod'] = 'Método de actualização';
$string['viewreport'] = 'Visualizar sessões passadas';
$string['autoscroll'] = 'Scroll automático';
$string['chat:talk'] = 'Talk in a chat';
$string['list_all_sessions'] = 'Mostrar todas as sessões.';
$string['no_complete_sessions_found'] = 'Não forem encontradas sessões completas.';
$string['listing_all_sessions'] = 'Mostrar todas as sessões.';
$string['list_complete_sessions'] = 'Mostrar apenas sessões completas.';
$string['notallowenter'] = 'Não está a autorizado(a) a entrar nesta sala de chat.';

?>
