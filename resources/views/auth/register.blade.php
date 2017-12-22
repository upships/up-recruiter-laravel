<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Criar Conta - UpShips Recruiter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="apple-touch-icon" href="/theme/pages/ico/60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/theme/pages/ico/76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/theme/pages/ico/120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/theme/pages/ico/152.png">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="/theme/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/theme/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/theme/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/theme/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
        <link class="main-stylesheet" href="/theme/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
        window.onload = function()
        {
          // fix for windows 8
          if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/theme/pages/css/windows.chrome.fix.css" />'
        }
        </script>
    </head>
    <body class="fixed-header menu-pin menu-behind">
        <div class="register-container full-height sm-p-t-30">
          <div class="d-flex justify-content-center flex-column full-height ">

            <img src="/images/text.png" alt="logo" data-src="/images/text.png" data-src-retina="/images/text_retina.png" width="150" >

            <p>
                Your account will be validated by an administrator
            </p>

            <form class="form-horizontal p-t-15" method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}

                <div class="row my-2">
                    <div class="col">
                        <div class="form-group form-group-default">
                            <label for="name" >Nome</label>
                            <input type="text" name="name" placeholder="Seu nome" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col">
                        <div class="form-group form-group-default">
                            <label for="email" class="control-label">E-mail</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col">
                        <div class="form-group form-group-default">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Minimum 8 characters" class="form-control" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col">
                        <div class="form-group form-group-default">
                            <label for="password-confirm" >Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success btn-cons m-t-10" type="submit">
                    Create a new account
                </button>

            </form>
          </div>
        </div>

        <!-- BEGIN VENDOR JS -->
        <script src="/theme/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
        <script src="/theme/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script type="text/javascript" src="/theme/assets/plugins/select2/js/select2.full.min.js"></script>
        <script type="text/javascript" src="/theme/assets/plugins/classie/classie.js"></script>
        <script src="/theme/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
        <script src="/theme/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- END VENDOR JS -->
        <script src="/theme/pages/js/pages.min.js"></script>
        <script>
        $(function()
        {
          $('#form-register').validate()
        })
        </script>
    </body>
</html>
