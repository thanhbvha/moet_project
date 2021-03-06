<div id="menu-page">
    <div class="menuContainer">
        <div id="cssmenu">
            <ul>
                <li class="home">
                    <a href="{{ url('/') }}" title="Trang chủ" class="font-weight-bold">GIẢI THƯỞNG SINH VIÊN NGHIÊN CỨU KHOA HỌC</a>
                </li>
				{% if user is defined %}
                    {% if user.MoetUsersRoles.name === 'admin' %}
        				<li class="home">
                            {{ link_to('admin', 'Tài khoản', 'class':'font-weight-bold') }}
        				</li>
                        <li class="home">
                            {{ link_to('admin/topic', 'Đề tài', 'class':'font-weight-bold') }}
                        </li>
        				<li class="home">
                            {{ link_to('admin/units', 'Cơ sở đào tạo', 'class':'font-weight-bold') }}
        				</li>
        				<li class="home">
                            {{ link_to('admin/fields', 'Lĩnh vực', 'class':'font-weight-bold') }}
        				</li>
        				<li class="home">
                            {{ link_to('admin/specialize', 'Chuyên ngành', 'class':'font-weight-bold') }}
        				</li>
                    {% endif %}
                {% endif %}
            </ul>
        </div>
    </div>
</div>