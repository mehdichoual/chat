<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 01/04/2018
 * Time: 13:35
 */
include "header.php";
?>
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-black rounded box-shadow">
        <img class="avatar" src="../../public/images/img_avatar.png" alt="" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100" id="username"><?php echo $args["user"]->getUsername();?></h6>
            <small class="text-white"> <a href="/chat/user/logout/" >Se déconnecter</a></small>
        </div>
    </div>
    <div class="row">

        <div class="col-4 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Tout les membres</h6>
            <?php  foreach ($args["users"] as $user) {?>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1627e495a2a%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1627e495a2a%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">@<?php echo $user->getUsername();?></strong>
                        </div>
                        <?php if ($user->getConnected()== 1) {?>
                            <span class="connected"> En Ligne</span>
                        <?php } ?>
                    </div>
                </div>
            <?php }?>


        </div>
        <div class="col-8 bg-white rounded box-shadow allmessages">
            <h6 class="border-bottom border-gray pb-2 mb-0">Tout les messages</h6>

            <?php  foreach (array_reverse($args["messages"]) as $message) {?>
            <div class="media text-muted pt-3">
                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1627e495a25%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1627e495a25%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">@<?php echo $message->getUsername();?></strong>
                    <?php echo $message->getMessage();?>
                </p>
            </div>
            <?php } ?>

        </div>
    </div>
    <div class="row">
        <div class="col-4 bg-white rounded box-shadow"></div>
        <div class="col-8 bg-white rounded box-shadow">
            <form class="send" method="post">
                <div class="row align-bottom">
                    <div class="form-group col-10">
                        <label for="message">Message:</label>
                        <textarea class="form-control" rows="2" id="message" name="message"></textarea>
                    </div>
                    <div class="col-2 align-bottom">
                        <span id="send" class="btn btn-lg btn-secondary btn-send">Envoyer</span>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../../public/js/main.js"></script>

</main>
<?php include "footer.php";
?>