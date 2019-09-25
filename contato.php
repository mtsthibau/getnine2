<?php
//Variáveis

$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['phone'];
$mensagem = $_POST['message'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail
$arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:14px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
td{
  padding:10px;
}
</style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CFCFCF'>
          <tr>
            <td>
              <tr>
               <td width='500'>Nome: $nome</td>
              </tr>
              <tr>
                <td width='320'>E-mail:<b> $email</b></td>
               </tr>
               <tr>
                <td width='320'>Telefone:<b> $telefone</b></td>
              </tr>
              <tr>
                <td width='320'>Mensagem: $mensagem</td>
              </tr>
              <tr>
              <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
            </tr>
          </td>
        </tr>  
      </table>
  </html>
";

//enviar
// emails para quem será enviado o formulário
$destino = "contato@getnine.com.br";
// $destino = "mtsthibau@gmail.com";
$assunto = "CONTATO SITE GETNINE";

// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:'+ $email;
//$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);


if ($enviaremail) {
  header('Location: http://www.getnine.com.br/index.html?msg=1');
} else {
  header('Location: http://www.getnine.com.br/index.html?msg=2');
}
