<div class="banner-top">
    <div class="box-bannertop">
        <div class="logo">
            <a href="/">{{ image('img/logo.png') }}</a>
        </div>
        <div class="right-banner">
            <div class="top-menu" style="float:right;padding-right:5px;">
                <div id="top-menu">
                    <div class="row justify-content-between">
						<!--
                        {% if user is defined %}
                            {% if user.MoetUsersRoles.name === 'admin' %}
                                <div class="col-md-auto">
                                    {{ link_to('admin', 'Quản lý', 'class':'font-weight-bold') }}
                                </div>
                            {% endif %}
                        {% endif %}
						-->
                        <div class="col-md-auto">
                            {% if user is not defined %}
                                {{ link_to('login','Đăng nhập','class':'font-weight-bold') }}
                            {% else %}
                                {{ user.fullname }}
                                [{{ link_to('login/logout', 'Đăng xuất', 'class':'font-weight-bold') }}]
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="box-search" style="text-align:right !important">
                <div class="fsearch">
                    <input name="kwd" id="topSearchInput" value="Nhập từ khóa tìm kiếm" onfocus="if(this.value=='Nhập từ khóa tìm kiếm') this.value='';" onblur="if(this.value=='') this.value='Nhập từ khóa tìm kiếm';" type="text">
                    <button type="button" id="btnSearch" class="btn-search"></button>
                </div>
            </div-->
        </div>
    </div>
</div>