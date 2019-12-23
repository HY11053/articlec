<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth('web')->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="/search/brand" method="post" class="sidebar-form">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="brandname" class="form-control" autocomplete="off" placeholder="输入品牌名称...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">主管理界面</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-text"></i> <span>行业内容分类</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/article/categories')class="active" @endif><a href="/article/categories"><i class="fa fa-circle-o"></i>行业分类列表</a></li>
                    <li @if(Request::getRequestUri()=='/article/category/add')class="active" @endif><a href="/article/category/add"><i class="fa fa-circle-o"></i>行业分类添加</a></li>
                    <li @if(Request::getRequestUri()=='/article/types')class="active" @endif><a href="/article/types"><i class="fa fa-circle-o"></i>内容分类列表</a></li>
                    <li @if(Request::getRequestUri()=='/article/type/add')class="active" @endif><a href="/article/type/add"><i class="fa fa-circle-o"></i>内容分类添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-database"></i> <span>内容分类管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(\App\AdminModel\ArticleType::orderBy('id','asc')->get(['content_type','id']) as $articletype)
                    <li @if(Request::getRequestUri()=='/article/articletype/list/'.$articletype->id)class="active"@endif><a href="/article/articletype/list/{{$articletype->id}}" ><i class="fa fa-circle-o"></i>{{$articletype->content_type}}管理</a></li>
                    @endforeach
                  </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-word-o"></i>
                    <span>内容生成操作</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">generate</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/create/article')class="active"@endif><a href="/create/article"><i class="fa fa-circle-o"></i> 普通文档生成</a></li>
                    <li @if(Request::getRequestUri()=='/create/brandarticle')class="active"@endif><a href="/create/brandarticle"><i class="fa fa-circle-o"></i> 品牌文档生成</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-random"></i> <span>标题类型管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/title/titlecategory/add')class="active"@endif><a href="/title/titlecategory/add"><i class="fa fa-circle-o"></i> 标题分类添加</a></li>
                    <li @if(Request::getRequestUri()=='/title/titlecategory/lists')class="active"@endif><a href="/title/titlecategory/lists"><i class="fa fa-circle-o"></i> 标题分类列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>标题内容管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(\App\AdminModel\TitleCategory::orderBy('id','asc')->get(['type','id']) as $titletype)
                        <li @if(Request::getRequestUri()=='/title/lists/'.$titletype->id)class="active"@endif><a href="/title/lists/{{$titletype->id}}" ><i class="fa fa-circle-o"></i>{{$titletype->type}}管理</a></li>
                    @endforeach

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>临时采集数据</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/admin/makesitemap')class="active"@endif><a href="#"><i class="fa fa-circle-o"></i> 待开发中</a></li>
                    <li @if(Request::getRequestUri()=='/admin/phone')class="active"@endif><a href="#"><i class="fa fa-circle-o"></i> 待开发中</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>系统用户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/user/add')class="active"@endif><a href="/user/add"><i class="fa fa-circle-o"></i> 系统用户添加</a></li>
                    <li @if(Request::getRequestUri()=='/user/lists')class="active"@endif><a href="/user/lists"><i class="fa fa-circle-o"></i> 系统用户列表</a></li>
                    <li @if(Request::getRequestUri()=='/user/anysis')class="active"@endif><a href="/user/anysis"><i class="fa fa-circle-o"></i> 用户数据汇总</a></li>
                    <li @if(Request::getRequestUri()=='/user/data/infos')class="active"@endif><a href="/user/data/infos"><i class="fa fa-circle-o"></i> 数据导入筛选</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-wechat"></i> <span>违禁词汇管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/guarded_keywoeds')class="active"@endif><a href="/guarded_keywoeds"><i class="fa fa-circle-o"></i> 违禁词列表</a></li>
                    <li @if(Request::getRequestUri()=='/guarded_edit_keywoeds')class="active"@endif><a href="/guarded_edit_keywoeds"><i class="fa fa-circle-o"></i> 违禁词修改</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>品牌数据管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/brandinfo/lists')class="active"@endif><a href="/brandinfo/lists"><i class="fa fa-circle-o"></i> 品牌介绍列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>站点绑定管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/website/lists')class="active"@endif><a href="/website/lists"><i class="fa fa-circle-o"></i> 站点绑定列表</a></li>
                    <li @if(Request::getRequestUri()=='/website/add')class="active"@endif><a href="/website/add"><i class="fa fa-circle-o"></i> 站点绑定添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="https://github.com/HY11053/laravelcms"><i class="fa fa-book"></i> <i class="fa fa-angle-left pull-right"></i><span>加盟费用管理</span></a>
                <ul class="treeview-menu">
                    <li @if(Request::getRequestUri()=='/payment/categoryadd')class="active"@endif><a href="/payment/categoryadd"><i class="fa fa-circle-o"></i> 行业费用分类</a></li>
                    <li @if(Request::getRequestUri()=='/payment/categorylists')class="active"@endif><a href="/payment/categorylists"><i class="fa fa-circle-o"></i> 费用分类列表</a></li>
                    <li @if(Request::getRequestUri()=='/payment/add')class="active"@endif><a href="/payment/add"><i class="fa fa-circle-o"></i> 加盟费用添加</a></li>
                    <li @if(Request::getRequestUri()=='/payment/list')class="active"@endif><a href="/payment/list"><i class="fa fa-circle-o"></i> 加盟费用列表</a></li>
                </ul>
            </li>
            <li class="header">员工考核管理</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>周工作总结</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>待办事项</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>未完成事项</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
