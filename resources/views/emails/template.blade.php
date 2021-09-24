<!-- 
    /resources/views/template.blade.php
-->
<h3>Hello {{ $data->username }},
    <p>Thank you for signing up in our blog website, here are your registration details :<br>
    <strong>Email : </strong> {{ $data->email }}
    <strong>Password : </strong> {{ $data->password }}
    </p>
    <h5>Note : Password is encrypted, do don't worry.</h5>
    
I have some info for you, please visit my blog  <a href="http://127.0.0.1:8001/">here</a>.