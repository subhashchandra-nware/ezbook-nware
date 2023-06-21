<h4 style="font-family:Arial;font-size:16px;line-height:22px;color:#000;font-weight:normal;text-align:left">Hello {{ $fullName }} </h4>

<p style="font-family:Arial;font-size:16px;line-height:22px;color:#000;font-weight:normal;text-align:left">You registered an account on  Ezbook, before being able to use your account you need to verify that this is your email address by clicking here: </p>

<h4><a href="{{ url('/set-password')}}/{{ $token}}">Verify</a></h4>
<h5 style="font-family:Arial;font-size:16px;line-height:22px;color:#000;font-weight:normal;text-align:left"><strong>Kind Regards, <br/>Ezbook</strong></h5>