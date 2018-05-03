<div class="banner-top">
    <div class="box-bannertop">
        <div class="logo">
            <a href="/"><?= $this->tag->image(['img/logo.png']) ?></a>
        </div>
        <div class="right-banner">
            <div class="top-menu" style="float:right;padding-right:5px;">
                <div id="top-menu">
                    <div class="row justify-content-between">
                        <?php if (isset($user)) { ?>
                            <?php if ($user->MoetUsersRoles->name === 'admin') { ?>
                                <div class="col-md-auto">
                                    <?= $this->tag->linkTo(['admin', 'Manager', 'class' => 'font-weight-bold']) ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="col-md-auto">
                            <?php if (!isset($user)) { ?>
                                <?= $this->tag->linkTo(['login', 'Đăng nhập', 'class' => 'font-weight-bold']) ?>
                            <?php } else { ?>
                                <?= $user->fullname ?>
                                [<?= $this->tag->linkTo(['login/logout', 'Đăng xuất', 'class' => 'font-weight-bold']) ?>]
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-search" style="text-align:right !important">
                <div class="fsearch">
                    <input name="kwd" id="topSearchInput" value="Nhập từ khóa tìm kiếm" onfocus="if(this.value=='Nhập từ khóa tìm kiếm') this.value='';" onblur="if(this.value=='') this.value='Nhập từ khóa tìm kiếm';" type="text">
                    <button type="button" id="btnSearch" class="btn-search"></button>
                </div>
            </div>
        </div>
    </div>
</div>