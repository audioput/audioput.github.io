<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;


$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'].'<br>link:'.$_POST['link'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();

        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'marcio.lopes.fao@gmail.com';
        $mail->Password = '!Qdr1rm5';
        //$mail->SMTPSecure = 'tls';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;;
        $mail->Port = 465;

        $mail->setFrom($email, 'Audioput Website');
        $mail->addAddress('piotr@mailtrap.io', 'Me');
        $mail->Subject = 'Audioput - Pedido de descrição';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

        echo $body;
        if($mail->send()){

            die('Obrigado pela sua mensagem, Assim que possível iremos notificar sobre o seu pedido'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Desculpe algo deu errado, tente enviar sua mensagem para <a href="this92@mail.com">this92@mail.com</a> erro: ' . $mail->ErrorInfo;

        }
    }
}

?>
<head>
  <meta charset="UTF-8">
  <title>Audioput - Contato</title>
  <style>
    /*
    #freewa, iframe{
      display: none;
      /*avoiding orgfree.com ads
      
    }
    
    img[alt="Free Web Hosting"] {
      display: none;
    }
    */
    footer,
    nav {
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.rawgit.com/kimeiga/bahunya/css/bahunya-0.1.3.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<html>
<body>
  <form action="" method="post" id="contact-form">
    <h2>Fazer Pedido</h2>
    
    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
    <p>
      <label>Seu Nome: <br>
      <input name="name" type="text" required/>
      </label>
    </p>
    <p>
      <label>Email: <br> 
      <input style="cursor: pointer;" name="email" type="email" required/>
      </label>
    </p>
    <p>
      <label>Pedido: <br>
      <textarea name="message" required></textarea>
      </label>
    </p>
    <p>
      <label name="link">
        <input type="text" placeholder="http://pornhub.com/video" required>
      </label>
    </p>

    <p>
      <input type="submit" value="Send"/>
    </p>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: {allowEmpty: false}
          },
          email: {
              presence: {allowEmpty: false},
              email: true
          },
          message: {
              presence: {allowEmpty: false}
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
</body>
</html>