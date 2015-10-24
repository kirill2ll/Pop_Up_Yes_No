<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Bootstrap Optional Theme -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- JQuery Javascript -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <!-- Bootscript JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div id="modalConfirmYesNo" class="modal fade"">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            onclick="goToMainPage()"
                            class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 id="lblTitleConfirmYesNo" class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p id="lblMsgConfirmYesNo"></p>
                </div>
                <div class="modal-footer">
                    <button id="btnYesConfirmYesNo"
                            type="button" class="btn btn-primary">
                        Да
                    </button>
                    <button id="btnNoConfirmYesNo"
                            type="button" class="btn btn-default">
                        Не
                    </button>
                </div>
            </div>
        </div>
    </div>


        <script>
            checkCookie();

            function AsyncConfirmYesNo(title, msg, yesFn, noFn) {
                var $confirm = $("#modalConfirmYesNo");
                $confirm.modal('show');
                $("#lblTitleConfirmYesNo").html(title);
                $("#lblMsgConfirmYesNo").html(msg);
                $("#btnYesConfirmYesNo").off('click').click(function () {
                    yesFn();
                    $confirm.modal("hide");
                });
                $("#btnNoConfirmYesNo").off('click').click(function () {
                    noFn();
                    $confirm.modal("hide");
                });
            }

            function ShowConfirmYesNo() {
                AsyncConfirmYesNo(
                    "Имаш ли 18 години?",
                    "С ДА потвърждаваш, че си пълнолетен.",
                    MyYesFunction,
                    MyNoFunction
                );
            }

            function MyYesFunction() {
                setCookie("adult18", "yes", 7);
            }
            function MyNoFunction() {
                goToMainPage();
            }
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays *24*60*60* 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
            }
            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1);
                    if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
                }
                return "";
            }
            function checkCookie() {
                var user = getCookie("adult18");
                if (user == "") {
                    ShowConfirmYesNo();
                }
            }

            function goToMainPage(){
                window.open("http://www.nastroenie.bg", "_self");
            }

            $('#modalConfirmYesNo').click(function() {
                goToMainPage();
            });
            $('.modal-content').click(function(event){
                event.stopPropagation();
            });

            
        </script>

</body>
</html>