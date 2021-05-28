<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Email</title>
</head>
<body>
    <div>
        <h5>Dear {{$user->full_name}},</h5>
        <p>Your account has been created. Please, click the following link to activate your account.</p>
        <a href="{{route('verify',$user->email_verification_token)}}">Click Here</a>
        {{-- <a href="{{url("/klassroom/public/verify/{$user->email_verification_token}")}}">Click Here</a> --}}
    </div>
</body>
</html>