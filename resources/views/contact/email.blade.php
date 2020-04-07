<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h2>
            SLS Vous remercie
        </h2>
        <p>
            Nous avons bien réceptionné votre message qui est le suivant :
        </p>

        <UL>
            <li><strong>Last Name</strong> : {{ $contac_us->lastname }}</li>
            <li><strong>First Name</strong> : {{ $contac_us->firstname }}</li>
            <li><strong>Email</strong> : {{ $contac_us->email }}</li>
            <li><strong>Subject</strong> : {{ $contac_us->subject }}</li>
            <li><strong>Message</strong> : {{ $contac_us->message }}</li>
        </UL>

        <p>
            Thanks and regards,
            SLS Team
        </p>
    </body>

</html>






















You received a message from : {{ $name }}
<p>
    Name: {{ $name }}
</p>
<p>
    Email: {{ $email }}
</p>
<p>
    Message: {{ $user_message }}
</p>
