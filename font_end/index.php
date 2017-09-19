<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php require_once './title.php'; ?></title>
        <script src="../js/js_font.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../js/css/zoom.css">
    </head>
    <body>
        <div id="wrapper">

            <!-- header -->
            <div id="header"></div>

            <!-- top menu -->
            <div id="top-menu">
                <?php include "top_menu.php"; ?>
            </div>

            <!-- content wrap -->
            <div id="content-wrap">
                <table cellpadding="3px" width="100%">
                    <tr valign="top">

                        <!-- menu left -->
                        <td width="230px"style="border-right: #ccc 1px solid;
                            padding-left: 0px;margin-top: 0px;">
                            <?php include "menu_left.php"; ?>
                        </td>

                        <!-- content center -->
                        <td style="padding-left: 0px; padding-right: 0px;color:#666;">
                            <?php
                            if (!empty($_GET["url"])) {
                                include $_GET["url"] . ".php";
                            } else {
                                require_once './show_food.php';
                            }
                            ?>
                        </td>

                    </tr>
                </table>
            </div>
            <div><hr style="border: #ccc 1px dotted;"/></div>
            <div id="facebook">
                <div class="fb-comments"
                     data-href="https://www.facebook.com/messages/t/1250677434963616"
                     data-width="1024" data-numposts="1">
                </div>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
            </div>

            <!-- footer -->
            <div id="footer">
                <?php include "footer.php"; ?>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="../js/js/zoom.js"></script>
    </body>
</html>
